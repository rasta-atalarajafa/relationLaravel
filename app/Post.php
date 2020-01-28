<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','article','slug','file','author_id','category_id','date','views',];

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function category()
    {
        return $this->belongsTo(Categorie::class, 'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_to_tags', 'post_id', 'tag_id');
    }

    public function getDateAttribute($tanggal)
    {
        return $this->toIndoDate($tanggal);
    }
    
    public function setDateAttribute($tanggal)
    {
        $this->attributes['date'] = $this->formatDate($tanggal);
    }

    private function indoMonth($month_name)
    {
        $month = [
            "Januari" => "01", 
            "Februari" => "02",
            "Maret"=> "03",
            "April" => "04",
            "Mei" => "05",
            "Juni" => "06",
            "Juli" => "07",
            "Agustus" => "08",
            "September" => "09",
            "Oktober" => "10",
            "November" =>"11",
            "Desember" => "12"
        ];
        return $month[$month_name];
    }

    private function formatDate($indo_date)
    {
        $date = explode(" ", $indo_date);
        return $date[2].'-'.$this->indoMonth($date[1]).'-'.$date[0];
    }

    private function toIndoMonth($month_number)
    {
        $month = [
            1  => "Januari", 
            2  => "Februari",
            3  => "Maret",
            4  => "April",
            5  => "Mei",
            6  => "Juni",
            7  => "Juli",
            8  => "Agustus",
            9  => "September",
            10 => "Oktober",
            11 => "November",
            12 => "Desember"
        ];
        return $month[(int)$month_number];
    }

    private function toIndoDate($date)
    {
        $mysql_date = explode("-", $date);

        return $mysql_date[2].' '.$this->toIndoMonth($mysql_date[1]).' '.$mysql_date[0];
    }
}
