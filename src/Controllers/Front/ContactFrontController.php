<?php

namespace Foostart\Contact\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use URL,
Route,
Redirect;
use Foostart\Contact\Models\Contacts;
use Foostart\Contact\Validators\ContactAdminValidator;
class ContactFrontController extends Controller {

    public $data_view = array();
    private $obj_contact = NULL;
    private $obj_validator = NULL;


    public function __construct() {
        $this->obj_contact = new Contacts();
    }

    /**
     *
     * @return type
     */

    /******************************************************************
    ***************************FUNCTION INDEX*************************
    *******************************************************************/
    public function index(Request $request) {
        $obj_contact = new Contacts();
        $contact = $obj_contact->get_contacts();
        $this->data_view = array(
            'request' => $request,
            'contact' => $contact
            );
        
        return view('contact::contact.front.index', $this->data_view);
    }


    /******************************************************************
    ***************************FUNCTION DETAIL*************************
    *******************************************************************/
    public function detail(Request $request) {
        $params = $request->all();
        $list_contact = $this->obj_contact->get_contacts($params);

        $this->data_view = array_merge($this->data_view, array(
            'contact' => $list_contact,
            'request' => $request,
            'params' => $params
        ));
        return view('contact::contact.front.detail', $this->data_view);
    }


    /******************************************************************
    ***************************FUNCTION ADD****************************
    *******************************************************************/
    public function add(Request $request) {
        $contact = new Contacts();
        $contact = $contact->get();
        $input = $request->all();
        $contact_id = $this->obj_contact->add_contact($input);
        $this->data_view = array('contact' => $contact,
            'request' => $request
            );

        return Redirect::route("detail");
        /*\Session::flash('contact::contact.front.index', trans('contact::contact_admin.message_add_successfully'));  */
    }


    /******************************************************************
    ***************************FUNCTION EDIT***************************
    *******************************************************************/
    public function edit(Request $request) {

        $contact = NULL;
        $contact_id = (int) $request->get('id');

        if (!empty($contact_id) && (is_int($contact_id))) {
            $contact = $this->obj_contact->find($contact_id);
        }

        $this->data_view = array_merge($this->data_view, array(
            'contact' => $contact,
            'request' => $request
            ));
        return view('contact::contact.front.edit', $this->data_view);
        //return Redirect::route('detail');
    }  



    /******************************************************************
    ***************************FUNCTION POST***************************
    *******************************************************************/
    public function post(Request $request) {

        $this->obj_validator = new ContactAdminValidator();

        $input = $request->all();

        $contact_id = (int) $request->get('id');
        $contact = NULL;

        $data = array();

        if (!$this->obj_validator->validate($input)) {

            $data['errors'] = $this->obj_validator->getErrors();

            if (!empty($contact_id) && is_int($contact_id)) {

                $contact = $this->obj_contact->find($contact_id);
            }
        } else {
            if (!empty($contact_id) && is_int($contact_id)) {

                $contact = $this->obj_contact->find($contact_id);

                if (!empty($contact)) {

                    $input['contact_id'] = $contact_id;
                    $contact = $this->obj_contact->update_contact($input);

                    //Message
                    \Session::flash('message', trans('contact::contact_admin.message_update_successfully'));
                    return Redirect::route("detail", ["id" => $contact->contact_id]);
                } else {

                    //Message
                    \Session::flash('message', trans('contact::contact_admin.message_update_unsuccessfully'));
                }
            } else {

                $contact = $this->obj_contact->add_contact($input);

                if (!empty($contact)) {

                    //Message
                    \Session::flash('message', trans('contact::contact_admin.message_add_successfully'));
                    return Redirect::route("detail", ["id" => $contact->contact_id]);
                } else {

                    //Message
                    \Session::flash('message', trans('contact::contact_admin.message_add_unsuccessfully'));
                }
            }
        }

        $this->data_view = array_merge($this->data_view, array(
            'contact' => $contact,
            'request' => $request,
            ), $data);

                return view('contact::contact.contact_edit', $this->data_view);

    }


    /******************************************************************
    ***************************FUNCTION DELETE*************************
    *******************************************************************/
    public function delete(Request $request) {

        $contact = NULL;
        $contact_id = $request->get('id');

        if (!empty($contact_id)) {
            $contact = $this->obj_contact->find($contact_id);

            if (!empty($contact)) {
                //Message
                \Session::flash('message', trans('contact::contact_admin.message_delete_successfully'));

                $contact->delete();
            }
        } else {
            
        }

        $this->data_view = array_merge($this->data_view, array(
            'contact' => $contact,
            ));
        return Redirect::route('detail');
    } 
}
