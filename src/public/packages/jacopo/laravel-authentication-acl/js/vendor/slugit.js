/*
 * jQuery slugIt plug-in 1.0
 *
 * Copyright (c) 2010 Diego Kuperman
 *
 * Inspired by perl module Text::Unidecode and Django urlfy.js
 *
 * Licensed under the BSD license:
 *      http://www.opensource.org/licenses/bsd-license.php
 */

jQuery.fn.slugIt = function(options) {
    var defaults = {
        events: 'keypress keyup',
        output: '#slug',
        separator: '-',
        map:    false,
        before: false,
        after: false
    };

    var opts  = jQuery.extend(defaults, options);

    var chars = latin_map();
    chars = jQuery.extend(chars, symbols_map());
    chars = jQuery.extend(chars, vn_map());
    chars = jQuery.extend(chars, currency_map());

    if ( opts.map ) {
        chars = jQuery.extend(chars, opts.map);
    }

    jQuery(this).bind(defaults.events, function() {
        var text = jQuery(this).val();

        if ( opts.before ) text = opts.before(text);
        text = jQuery.trim(text.toString());

        var slug = new String();
        for (var i = 0; i < text.length; i++) {
            if ( chars[text.charAt(i)] ) { slug += chars[text.charAt(i)] }
            else                         { slug += text.charAt(i) }
        }

        // Ensure separator is composable into regexes
        var sep_esc  = opts.separator.replace(/([.*+?^=!:${}()|\[\]\/\\])/g, "\\$1");
        var re_trail = new RegExp('^'+ sep_esc +'+|'+ sep_esc +'+$', 'g');
        var re_multi = new RegExp(sep_esc +'+', 'g');

        slug = slug.replace(/[^-\w\d\$\*\(\)\'\!\_]/g, opts.separator);  // swap spaces and unwanted chars
        slug = slug.replace(re_trail, '');                               // trim leading/trailing separators
        slug = slug.replace(re_multi, opts.separator);                   // eliminate repeated separatos
        slug = slug.toLowerCase();                                       // convert sting to lower case

        if ( opts.after ) slug = opts.after(slug);

        if ( typeof opts.output == "function" ) {
            opts.output(slug)
        } else {
            jQuery(opts.output).val(slug);         // input or textarea
            jQuery(opts.output).html(slug);        // other dom elements
        }

        return this;
    });

    function latin_map() {
        return {
            'À': 'A', 'Á': 'A', 'Â': 'A', 'Ã': 'A', 'Ä': 'A', 'Å': 'A', 'Æ': 'AE', 'Ç':
                'C', 'È': 'E', 'É': 'E', 'Ê': 'E', 'Ë': 'E', 'Ì': 'I', 'Í': 'I', 'Î': 'I',
            'Ï': 'I', 'Ð': 'D', 'Ñ': 'N', 'Ò': 'O', 'Ó': 'O', 'Ô': 'O', 'Õ': 'O', 'Ö':
                'O', 'Ő': 'O', 'Ø': 'O', 'Ù': 'U', 'Ú': 'U', 'Û': 'U', 'Ü': 'U', 'Ű': 'U',
            'Ý': 'Y', 'Þ': 'TH', 'ß': 'ss', 'à':'a', 'á':'a', 'â': 'a', 'ã': 'a', 'ä':
                'a', 'å': 'a', 'æ': 'ae', 'ç': 'c', 'è': 'e', 'é': 'e', 'ê': 'e', 'ë': 'e',
            'ì': 'i', 'í': 'i', 'î': 'i', 'ï': 'i', 'ð': 'd', 'ñ': 'n', 'ò': 'o', 'ó':
                'o', 'ô': 'o', 'õ': 'o', 'ö': 'o', 'ő': 'o', 'ø': 'o', 'ù': 'u', 'ú': 'u',
            'û': 'u', 'ü': 'u', 'ű': 'u', 'ý': 'y', 'þ': 'th', 'ÿ': 'y'
        };
    }

    function vn_map() {
        return {
            //a
            'à':'a', 'á':'a', 'ả':'a', 'ã':'a','ạ':'a',
            'ằ':'a', 'ắ':'a', 'ẳ':'a', 'ẵ':'a','ặ':'a',
            'ầ':'a', 'ấ':'a', 'ẩ':'a', 'ẫ':'a','ậ':'a',
            //e
            'è':'e', 'é':'e', 'ẻ':'e', 'ẽ':'e','ẹ':'e',
            'ề':'e', 'ế':'e', 'ể':'e', 'ễ':'e','ệ':'e',
            //u
            'ù':'u', 'ú':'u', 'ủ':'u', 'ũ':'u','ụ':'u',
            'ừ':'u', 'ứ':'u', 'ử':'u', 'ữ':'u','ự':'u',
            //o
            'ò':'o', 'ó':'o', 'ỏ':'o', 'õ':'o','ọ':'o',
            'ờ':'o', 'ớ':'o', 'ở':'o', 'ỡ':'o','ợ':'o',
            'ồ':'o', 'ố':'o', 'ổ':'o', 'ỗ':'o','ộ':'o',
            //i
            
            
        };
    }
    
    function currency_map() {
        return {
            '€': 'euro', '$': 'dollar', '₢': 'cruzeiro', '₣': 'french franc', '£': 'pound',
            '₤': 'lira', '₥': 'mill', '₦': 'naira', '₧': 'peseta', '₨': 'rupee',
            '₩': 'won', '₪': 'new shequel', '₫': 'dong', '₭': 'kip', '₮': 'tugrik',
            '₯': 'drachma', '₰': 'penny', '₱': 'peso', '₲': 'guarani', '₳': 'austral',
            '₴': 'hryvnia', '₵': 'cedi', '¢': 'cent', '¥': 'yen', '元': 'yuan',
            '円': 'yen', '﷼': 'rial', '₠': 'ecu', '¤': 'currency', '฿': 'baht'
        };
    }

    function symbols_map() {
        return {
            '©':'(c)', 'œ': 'oe', 'Œ': 'OE', '∑': 'sum', '®': '(r)', '†': '+',
            '“': '"', '”': '"', '‘': "'", '’': "'", '∂': 'd', 'ƒ': 'f', '™': 'tm',
            '℠': 'sm', '…': '...', '˚': 'o', 'º': 'o', 'ª': 'a', '•': '*',
            '∆': 'delta', '∞': 'infinity', '♥': 'love', '&': 'and'
        };
    }

    return this;
}
