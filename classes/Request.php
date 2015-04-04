<?php
/**
 * Class Page
 * @brief Handles Pages
 */
class Request {

    public $id = null;
    public $name = null;
    public $email = null;
    public $subject = null;
    public $message = null;
    public $language = null;
    public $success = null;
    public $error_text = null;

    public function __construct( $data=array() ) {

        if ( isset ( $data['name'] ) ) { $this->name = $data['name']; }
        if ( isset ( $data['email'] ) ) { $this->email = $data['email']; }
        if ( isset ( $data['subject'] ) ) { $this->subject = $data['subject']; }
        if ( isset ( $data['message'] ) ) { $this->message = $data['message']; }
        if ( isset ( $data['language'] ) ) { $this->language = $data['language']; }
        if ( isset ( $data['success'] ) ) { $this->success = $data['success']; }
        if ( isset ( $data['error_text'] ) ) { $this->error_text = $data['error_text']; }
    }


    /**
     * Sets the object's properties using the edit form post values in the supplied array
     *
     * @param array $params The form post values
     */
    public function storeFormValues ( $params )
    {
        // Store all parameters
        $this->__construct($params);
    }

    /**
     * Inserts the current Page object into the database, and sets its ID property.
     */
    public function insert() {

        //Does the Page object already have an ID?
        if ( !is_null( $this->id ) )
            trigger_error ( "Page::insert(): Attempt to insert an Page object that already has its ID property set (to $this->id).", E_USER_ERROR );

        //Insert the Page
        $conn = new MyPDO();
        $sql = "INSERT INTO pages ( title, content )
                VALUES ( :title, :content )";
        $st = $conn->prepare( $sql );
        $st->bindValue( ":title", $this->title, MyPDO::PARAM_STR );
        $st->bindValue( ":content", $this->content, MyPDO::PARAM_STR );
        $st->execute();
        $this->id = $conn->lastInsertId();
        $conn = null;
    }
}