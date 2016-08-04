<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;
use DB;

class Testimonials extends Model {

    protected $table = 'real_estate_testimonials';

    protected $primaryKey = 'real_estate_testimonial_id';

    public $timestamps = false;

    protected $fillable = [
                            "real_estate_testimonial_title",
                            "real_estate_testimonial_description",
                            "real_estate_testimonial_author_name",
                            "real_estate_testimonial_image",
                        ];

    protected $guarded = ["real_estate_testimonial_id"];

    /*********************************************
     * listTestimonial
     *
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     *
     * @status: REVIEWED
     */

    public function listTestimonial($params = array()) {
        $this->config_reader = App::make('config');
        $results_per_page = $this->config_reader->get('acl_base.testimonial_page');

        $testimanial = self::orderBy('real_estate_testimonial_id', 'DESC')
                ->paginate($results_per_page);
        return $testimanial;
    }

    /*     * ********************************************
     * findTestimonialId
     *
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     *
     * @status: REVIEWED
     */

    public function findTestimonialId($id) {
        $testimanial = self::where('real_estate_testimonial_id', $id)
                ->first();

        return $testimanial;
    }

    /***********************************************
     * updateTestimonial
     *
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     *
     * @status: REVIEWED
     */

    public function updateTestimonial($input) {

        $testimonial = self::find($input['id']);

        if (!empty($testimonial)) {

            $testimonial->real_estate_testimonial_title = $input['title'];
            $testimonial->real_estate_testimonial_description = $input['description'];
            $testimonial->real_estate_testimonial_author_name = $input['author_name'];

            if (!empty($input['image'])) {
                $testimonial->real_estate_testimonial_image = $input['filename'];
            }
            $testimonial->save();

        } else {

        }
    }

    /*********************************************
     * addTestimonial
     *
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     *
     * @status: REVIEWED
     */

    public function addTestimonial($input) {

        $testimonial = self::create([
                    'real_estate_testimonial_title' => $input['title'],
                    'real_estate_testimonial_description' => $input['description'],
                    'real_estate_testimonial_author_name' => $input['author_name'],
                    'real_estate_testimonial_image' => @$input['filename']
        ]);

        return $testimonial;
    }

    /***************************************************************************
     * deleteTestimonial
     *
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 04/08/2016
     *
     * @status: REVIEWED
     */

    public function deleteTestimonial($input) {
        $testimanial = self::find($input['id']);
        return $testimanial->delete();
    }

}
