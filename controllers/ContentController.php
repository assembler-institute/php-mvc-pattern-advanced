<?php

class ContentController extends Controller
{
    function __construct()
    {
        if (EXECUTION_FLOW)
            echo "<p>Content controller</p>";

        parent::__construct();

        $this->view->message = "";
        $this->view->data = [];
    }

    public function __call($method, $arguments)
    {
        if ($method == 'consultContent') {
            if (count($arguments) == 0) {
                return call_user_func_array(array($this, 'getContent'), $arguments);
            } else if (count($arguments) == 1) {
                return call_user_func_array(array($this, 'getContentById'), $arguments);
            }
        } else {
            return false;
        }
    }

    function defaultMethod()
    {
        $this->getContent();
    }

    function getContent()
    {
        $contents = $this->model->get();
        $this->view->contents = $contents;
        $this->view->render('consult/index');
    }

    function getContentById($param = null)
    {
        $id = $param[0];

        $content = $this->model->getById($id);

        //Create a attribute in the VIEW for using in the HTML code
        $this->view->content = $content;
        $this->view->message = "";
        $this->view->render('consult/detail');
    }

    function createContent()
    {
        if (!empty($_POST)) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $text = $_POST['text'];

            $message = "";

            //Goes to create model function insert
            $result = $this->model->insert(['name' => $name, 'email' => $email, 'text' => $text]);
            if ($result == "OK") {
                $message = 'New content created';
            } else {
                $message = $result;
            }

            $this->view->message = $message;
        }
        $this->view->render('create/index');
        // $this->render("create");
    }

    function updateContent()
    {
        if (!empty($_POST)) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $text = $_POST['text'];

            if ($this->model->update(['id' => $id, 'name' => $name, 'email' => $email, 'text' => $text])) {
                //Content updated correctly
                $content = new Content();
                $content->id = $id;
                $content->name = $name;
                $content->email = $email;
                $content->text = $text;

                $this->view->content = $content;
                $this->view->message = "Content updated correctly";
            } else {
                //Error updating content
                $this->view->message = "Error updating content";
            }
            $this->view->render('consult/detail');
        } else {
            // $this->view->render('error/index');
            $controller = new FailureController();
        }
    }

    function deleteContent($param)
    {
        $id = $param[0];

        if ($this->model->delete($id)) {
            //$this->view->message = "Content deleted correctly";
            $message = "Content deleted correctly";
        } else {
            //$this->view->message = "Error deleting content";
            $message = "Error deleting content";
        }
        //$this->render();
        //$this->view->render('consult/index');
        $this->consultContent();
    }
}
