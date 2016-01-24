<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /**
     * Generate the pound rating images depending on what they are searching for.
     * 
     * Receives a number in the form of a string (1-5), returns a string
     * containing an HTML snippet with the relevant images.
     * 
     * @param string $rating
     * @return string
     */
    public static function displayRating($rating) {
        
        switch ($rating) {
            case 1:
            $display = "
                        <img src='./img/ratingon.png'>
                        <img src='./img/ratingoff.png'>
                        <img src='./img/ratingoff.png'>
                        <img src='./img/ratingoff.png'>
                        <img src='./img/ratingoff.png'>
                        ";
                break;
            case 2:
                $display = "
                        <img src='./img/ratingon.png'>
                        <img src='./img/ratingon.png'>
                        <img src='./img/ratingoff.png'>
                        <img src='./img/ratingoff.png'>
                        <img src='./img/ratingoff.png'>
                        ";
                break;
            case 3:
                $display = "
                        <img src='./img/ratingon.png'>
                        <img src='./img/ratingon.png'>
                        <img src='./img/ratingon.png'>
                        <img src='./img/ratingoff.png'>
                        <img src='./img/ratingoff.png'>
                        ";
                break;
            case 4:
                $display = "
                        <img src='./img/ratingon.png'>
                        <img src='./img/ratingon.png'>
                        <img src='./img/ratingon.png'>
                        <img src='./img/ratingon.png'>
                        <img src='./img/ratingoff.png'>
                        ";
                break;
            case 5:
                $display = "
                        <img src='./img/ratingon.png'>
                        <img src='./img/ratingon.png'>
                        <img src='./img/ratingon.png'>
                        <img src='./img/ratingon.png'>
                        <img src='./img/ratingon.png'>
                        ";
                break;

            default:
                $display = '';
                break;
        }
        
        return $display;
    }
}
