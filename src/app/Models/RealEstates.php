<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;
use DB;

class RealEstates extends Model {

    protected $table = 'real_estates';
    protected $primaryKey = 'real_estate_id';
    public $timestamps = false;
    protected $fillable = [ "real_estate_title",
        "real_estate_description",
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
     * listRealEstate
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function listRealEstate($params = array()) {
        $this->config_reader = App::make('config');
        $results_per_page = $this->config_reader->get('acl_base.testimonial_page');

        $real_estate = self::orderBy('real_estate_id', 'DESC')
                ->paginate($results_per_page);
        return $real_estate;
    }

    /*     * ********************************************
     * findRealEstateId
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function findRealEstateId($id) {
        $real_estate = self::where('real_estate_id', $id)
                ->first();

        return $real_estate;
    }

    /*     * ********************************************
     * updateRealEstate
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function updateRealEstate($input) {
        
        $real_estate = self::find($input['id']);
        if (!empty($real_estate)) {
            $real_estate->real_estate_title = $input['title'];
            $real_estate->real_estate_category_id = $input['datacat'];
            $real_estate->real_estate_description = $input['description'];
            $real_estate->real_estate_bedroom = $input['bedroom'];
            $real_estate->real_estate_bathroom = $input['bathroom'];
            $real_estate->real_estate_sq = $input['sq'];
            $real_estate->real_estate_year_build = $input['build_year'];
            $real_estate->real_estate_images = $input['filename'];
            $real_estate->real_estate_cost = $input['cost'];
            $real_estate->save();
        } else {
            
        }
    }

    /*     * ********************************************
     * addRealEstate
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function addRealEstate($input) {

        $real_estate = self::create([
                    'real_estate_title' => $input['title'],
                    'real_estate_category_id' => $input['datacat'],
                    'real_estate_description' => $input['description'],
                    'real_estate_bedroom' => $input['bedroom'],
                    'real_estate_bathroom' => $input['bathroom'],
                    'real_estate_sq' => $input['sq'],
                    'real_estate_year_build' => $input['build_year'],
                    'real_estate_images' => $input['filename'],
                    'real_estate_cost' => $input['cost'],
        ]);
        return $real_estate;
    }

    /*     * ********************************************
     * deleteRealEstate
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function deleteRealEstate($input) {
       
        $real_estate = self::find($input['id']);
        
        return $real_estate->delete();
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

        $real_estate = self::where('real_estate_id', $params['real_estate_id'])
                ->first();

        return $real_estate;
    }
    

}
