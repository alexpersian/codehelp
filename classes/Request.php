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

        if ( isset( $data['id'] ) ) { $this->id = (int) $data['id']; }

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
        $sql = "INSERT INTO requests ( name, date, email, subject, message, language, success, error_text )
                VALUES ( :name, CURRENT_DATE, :email, :subject, :message, :language, :success, :error_text )";

        $st = $conn->prepare( $sql );

        $st->bindValue( ":name", $this->name, MyPDO::PARAM_STR );
        $st->bindValue( ":email", $this->email, MyPDO::PARAM_STR );
        $st->bindValue( ":subject", $this->subject, MyPDO::PARAM_STR );

        $st->bindValue( ":message", $this->message, MyPDO::PARAM_STR );
        $st->bindValue( ":language", $this->language, MyPDO::PARAM_STR );
        $st->bindValue( ":success", $this->success, MyPDO::PARAM_STR );
        $st->bindValue( ":error_text", $this->error_text, MyPDO::PARAM_STR );

        $st->execute();

        $this->id = $conn->lastInsertId();

        $conn = null;
    }
}