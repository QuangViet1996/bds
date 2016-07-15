<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;
use DB;

class CustomHtml extends Model {

    protected $table = 'real_estate_custom_html';
    
    protected $primaryKey = 'real_estate_custom_html_id';
    
    public $timestamps = false;
    
    protected $fillable = [ 
                            "real_estate_custom_html_title",
                            "real_estate_page_position_id",
                            "real_estate_custom_html_slug",
                            "real_estate_custom_html_content",
                        ];
    
    protected $guarded = ["real_estate_custom_html_id"];

    /*********************************************
     * listCustomHtml
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function listCustomHtml($params = array()) {
        $this->config_reader = App::make('config');
        $results_per_page = $this->config_reader->get('acl_base.testimonial_page');

        $custom = self::orderBy('real_estate_custom_html_id', 'DESC')
                ->paginate($results_per_page);
        return $custom;
    }

    /*     * ********************************************
     * findCustomHtmlId
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function findCustomHtmlId($id) {
        $custom = self::where('real_estate_custom_html_id', $id)
                ->first();

        return $custom;
    }

    /***********************************************
     * updateCustomHtml
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function updateCustomHtml($input) {
        
        $custom = self::find($input['id']);
        
        if (!empty($custom)) {
            
            $custom->real_estate_custom_html_title = $input['title'];
            $custom->real_estate_custom_html_slug = $input['slug'];
            $custom->real_estate_custom_html_content = $input['content'];
            $custom->real_estate_page_position_id = $input['datacat'];
            $custom->save();
            
        } else {
            
        }
    }

    /*********************************************
     * addCustomHtml
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function addCustomHtml($input) {

        $custom = self::create([
                    'real_estate_custom_html_title' => $input['title'],
                    'real_estate_custom_html_slug' => $input['slug'],
                    'real_estate_custom_html_content' => $input['content'],
                    'real_estate_page_position_id' => $input['datacat'],
        ]);
        
        return $custom;
    }

    /*********************************************
     * deleteCustomHtml
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function deleteCustomHtml($input) {
        $custom = self::find($input['id']);
        return $custom->delete();
    }

}
