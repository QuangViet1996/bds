<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;
use DB;

class Testimonial extends Model {

    protected $table = 'real_estate_testimonials';
    protected $primaryKey = 'real_estate_testimonial_id';
    public $timestamps = false;
    protected $fillable = [ "real_estate_testimonial_title",
        "real_estate_testimonial_description",
        "real_estate_testimonial_author_name",
    ];
    protected $guarded = ["real_estate_testimonial_id"];

    /*     * ********************************************
     * listTestimonial
     * 
     * @author: Kang
     * @web: http://tailieuweb.com
     * @date: 26/6/2016
     * 
     * @status: REVIEWED
     */

    public function listTestimonial($params = array()) {

        $testimanial = self::orderBy('real_estate_testimonial_id', 'DESC')
                ->get();
        var_dump($testimanial->toArray());
        die();
        return $testimanial;
    }

}
