<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class Categories extends Model {

    protected $table = 'real_estate_categories';
    protected $primaryKey = 'real_estate_category_id';
    public $timestamps = false;
    protected $fillable = [
        "real_estate_category_title",
        "real_estate_category_overview",
        "real_estate_category_description",
        "real_estate_category_image",
        "real_estate_category_status",
    ];
    protected $guarded = ["real_estate_category_id"];

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
        $category = self::find($id);
        return $category;
    }
    public function getTop(){
        $categories = self::limit(3)->get();
        return $categories;
    }

    /*     * ********************************************
     * updateCategories
     *
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     *
     * @status: REVIEWED
     */

    public function updateCategories($input) {

        $category = self::find($input['id']);

        if (!empty($category)) {

            $category->real_estate_category_title = $input['title'];
            $category->real_estate_category_description = $input['description'];

            $category->save();
        } else {
            return null;
        }
    }

    /*     * ********************************************
     * addCategories
     *
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     *
     * @status: REVIEWED
     */

    public function addCategories($input) {

        $category = self::create([
                    'real_estate_category_title' => $input['title'],
                    'real_estate_category_description' => $input['description'],
        ]);
        return $category;
    }

    /*     * ********************************************
     * deleteCategories
     *
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     *
     * @status: REVIEWED
     */

    public function deleteCategories($id) {
        $category = self::find($id);

        if (!empty($category)) {
            return $category->delete();
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

        $category = self::orderBy('real_estate_category_title', 'ASC')
                ->paginate($results_per_page);

        return $category;
    }

    /*     * ********************************************
     * viewCategories
     *
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     *
     * @status: REVIEWED
     */

    public function viewCategories($params = array()) {

        $category = self::where('real_estate_category_id', $params['real_estate_category_id'])
                ->first();

        return $category;
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

    public function getCategories($params = array()) {

        $category = self::orderBy('real_estate_category_title', 'ASC')
                ->pluck('real_estate_category_title', 'real_estate_category_id');
        return $category;
    }

}
