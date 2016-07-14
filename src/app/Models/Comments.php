<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class Comments extends Model {

    protected $table = 'real_estate_comments';
    protected $primaryKey = 'real_estate_comment_id';
    public $timestamps = false;
    protected $fillable = [ "real_estate_comment_real_estate_id",
        "real_estate_comment_title",
        "real_estate_comment_description",
    ];
    protected $guarded = ["real_estate_comment_id"];

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
        $comment = self::find($id);
        return $comment;
    }

    /*     * ********************************************
     * updateComments
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function updateComments($input) {

        $comment = self::find($input['id']);

        if (!empty($comment)) {

            $comment->real_estate_comment_real_estate_id = $input['house_id'];
            $comment->real_estate_comment_title = $input['title'];
            $comment->real_estate_comment_description = $input['description'];

            $comment->save();
        } else {
            return null;
        }
    }

    /*     * ********************************************
     * addComments
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function addComments($input) {

        $comment = self::create([
                    'real_estate_comment_real_estate_id' => $input['house_id'],
                    'real_estate_comment_title' => $input['title'],
                    'real_estate_comment_description' => $input['description'],
        ]);
        return $comment;
    }

    /*     * ********************************************
     * deleteComments
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function deleteComments($id) {
        $comment = self::find($id);

        if (!empty($comment)) {
            return $comment->delete();
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

        $comment = self::orderBy('real_estate_comment_title', 'ASC')
                ->paginate($results_per_page);

        return $comment;
    }

    /*     * ********************************************
     * viewComments
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function viewComments($params = array()) {

        $comment = self::where('real_estate_comment_id', $params['real_estate_comment_id'])
                ->first();

        return $comment;
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

    public function getComments($params = array()) {

        $comment = self::orderBy('real_estate_comment_title', 'ASC')
                ->pluck('real_estate_comment_title', 'real_estate_comment_real_estate_id');
        return $comment;
    }

}
