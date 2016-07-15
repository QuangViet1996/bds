<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;
use DB;

class Agency extends Model {

    protected $table = 'real_estates';
    protected $primaryKey = 'real_estate_id';
    public $timestamps = false;
    protected $fillable = [ "real_estate_title",
        "real_estate_description",
        "user_id",
        "real_estate_category_id",
        "real_estate_bedroom",
        "real_estate_bathroom",
        "real_estate_sq",
        "real_estate_year_build",
        "real_estate_images",
        "real_estate_cost",
    ];
    protected $guarded = ["real_estate_id"];

    /*     * ********************************************
     * listAgency
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function listAgency($uid) {
        $this->config_reader = App::make('config');
        $results_per_page = $this->config_reader->get('acl_base.testimonial_page');

        $agency = self::orderBy('real_estate_id', 'DESC')
               ->where('user_id',$uid)
                ->paginate($results_per_page);
        return $agency;
    }

    /*     * ********************************************
     * findAgencyId
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function findAgencyId($id) {
        $agency = self::where('real_estate_id', $id)
                ->first();

        return $agency;
    }

    /*     * ********************************************
     * updateAgency
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function updateAgency($input,$uid) {
        
        $agency = self::find($input['id'])
                ->where('user_id',$uid);
        if (!empty($agency)) {
            $agency->real_estate_title = $input['title'];
            $agency->real_estate_category_id = $input['datacat'];
            $agency->real_estate_description = $input['description'];
            $agency->real_estate_bedroom = $input['bedroom'];
            $agency->real_estate_bathroom = $input['bathroom'];
            $agency->real_estate_sq = $input['sq'];
            $agency->real_estate_year_build = $input['build_year'];
            $agency->real_estate_images = $input['filename'];
            $agency->real_estate_cost = $input['cost'];
            $agency->save();
        } else {
            
        }
    }

    /*     * ********************************************
     * addAgency
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function addAgency($input,$uid) {
     
        $agency = self::create([
                    'real_estate_title' => $input['title'],
                    'user_id' => $uid,
                    'real_estate_category_id' => $input['datacat'],
                    'real_estate_description' => $input['description'],
                    'real_estate_bedroom' => $input['bedroom'],
                    'real_estate_bathroom' => $input['bathroom'],
                    'real_estate_sq' => $input['sq'],
                    'real_estate_year_build' => $input['build_year'],
                    'real_estate_images' => $input['filename'],
                    'real_estate_cost' => $input['cost'],
        ]);
        return $agency;
    }

    /*     * ********************************************
     * deleteAgency
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function deleteAgency($input,$uid) {
       
        $agency = self::find($input['id'])
                ->where('user_id',$uid);
        
        return $agency->delete();
    }
    
     /*     * ********************************************
     * viewRe
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function viewRe($params = array()) {

        $agency = self::where('real_estate_id', $params['real_estate_id'])
                ->first();

        return $agency;
    }
    

}
