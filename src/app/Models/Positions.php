<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class Positions extends Model {

    protected $table = 'real_estate_page_positions';
    protected $primaryKey = 'real_estate_page_position_id';
    public $timestamps = false;
    protected $fillable = [ "real_estate_page_position_title",
    ];
    protected $guarded = ["real_estate_page_position_id"];

    /*     * ********************************************
     * findById
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function findById($id) {
        $position = self::find($id);
        return $position;
    }

    /*     * ********************************************
     * updatePositions
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function updatePositions($input) {

        $position = self::find($input['id']);

        if (!empty($position)) {

            $position->real_estate_page_position_title = $input['title'];

            $position->save();
        } else {
            return null;
        }
    }

    /*     * ********************************************
     * addPositions
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function addPositions($input) {

        $position = self::create([
                    'real_estate_page_position_title' => $input['title'],
        ]);
        return $position;
    }

    /*     * ********************************************
     * deletePositions
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function deletePositions($id) {
        $position = self::find($id);

        if (!empty($position)) {
            return $position->delete();
        } else {
            return FALSE;
        }
    }

    /*     * ********************************************
     * getPayrollSupportListCat
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function getList($params) {
        $this->config_reader = App::make('config');
        $results_per_page = $this->config_reader->get('acl_base.testimonial_page');

        $position = self::orderBy('real_estate_page_position_title', 'ASC')
                ->paginate($results_per_page);

        return $position;
    }

    /*     * ********************************************
     * getPayrollCat
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function getPositions($params = array()) {

        $position = self::orderBy('real_estate_page_position_title', 'ASC')
                ->pluck('real_estate_page_position_title', 'real_estate_page_position_id');
        return $position;
    }

}
