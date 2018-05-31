<?php


use App\Color;
use App\Size;

  // Check if Product has Color, and if it is Add it to Database
  function hasColor($color, $select_menu_value, $key)
    {
        $color_table = new Color;
        if ($color != $select_menu_value) {
          
          $color_table->color = $color;
          $color_table->product_key = $key;
          $color_table->save();

       }

    }

    // Check if Product has Size, and if it is Add it to Database
	function hasSize($size, $select_menu_value, $key)
	    {
	        $size_table = new Size;
	        if ($size != $select_menu_value) {
	          
	          $size_table->size = $size;
	          $size_table->product_key = $key;
	          $size_table->save();

	       }

	    }

	// Make a Unique Product Key
    function uniqueKey($request)
    {
    	// Available alpha caracters
        $charactersBig = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersSmall = 'abcdefghijklmnopqrstuvwxyz';

        
        $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999) . Auth::id() * 2
            . $charactersBig[rand(0, strlen($charactersBig) - 1)] . $charactersSmall[rand(0, strlen($charactersSmall) - 1)];
        $string = str_shuffle($pin);

        // Final Key
        return $uniqueProductKey = Auth::id() . $string . strval(time()) . $request->product_name[0];
    }

