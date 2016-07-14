<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;
use DB;

class Contact extends Model {

    protected $table = 'real_estate_contacts';
    protected $primaryKey = 'real_estate_contact_id';
    public $timestamps = false;
    protected $fillable = [ "real_estate_contact_title",
        "real_estate_contact_description",
        "real_estate_contact_author_name",
    ];
    protected $guarded = ["real_estate_contact_id"];

    /*     * ********************************************
     * listContact
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function listContact($params = array()) {
        $this->config_reader = App::make('config');
        $results_per_page = $this->config_reader->get('acl_base.testimonial_page');

        $contact = self::orderBy('real_estate_contact_id', 'DESC')
                ->paginate($results_per_page);
        return $contact;
    }

    /*     * ********************************************
     * findContactId
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function findContactId($id) {
        $contact = self::where('real_estate_contact_id', $id)
                ->first();

        return $contact;
    }

    /*     * ********************************************
     * updateContact
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function updateContact($input) {
        
        $contact = self::find($input['id']);
        if (!empty($contact)) {
            $contact->real_estate_contact_title = $input['title'];
            $contact->real_estate_contact_description = $input['description'];
            $contact->real_estate_contact_author_name = $input['author_name'];
            $contact->save();
        } else {
            
        }
    }

    /*     * ********************************************
     * addContact
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function addContact($input) {

        $contact = self::create([
                    'real_estate_contact_title' => $input['title'],
                    'real_estate_contact_description' => $input['description'],
                    'real_estate_contact_author_name' => $input['author_name'],
        ]);
        return $contact;
    }

    /*     * ********************************************
     * deleteContact
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function deleteContact($input) {
       
        $contact = self::find($input['id']);
        
        return $contact->delete();
    }
    

}
