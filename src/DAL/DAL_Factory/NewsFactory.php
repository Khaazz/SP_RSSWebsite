<?php

namespace DAL_Factory;

/**
 * DAL_Class NewsFactory
 * @package DAL_Factory
 */
class NewsFactory {

    /**
     * Create one News from DB data
     *
     * @param $data
     * @return \DAL_Class\News
     */
    public static function createOneNews($data) : \DAL_Class\News {
        return new \DAL_Class\News(
            $data["Url"],
            $data["Website"],
            $data["Title"],
            $data["Description"],
            $data["Date"],
            $data["NbClics"]
        );
    }

    /**
     * Create an array of News from DB data
     *
     * @param $data
     * @return array
     */
    public static function createNews($data) : array {
        $allNews = [];

        foreach($data as $d){
            $allNews[] = NewsFactory::createOneNews($d);
        }

        return $allNews;
    }


    /**
     * Create an array of News from NewsParsed array
     *
     * @param $data
     * @return array
     */
    public static function createNewsFromParsed(array $data) : array {
        $allNews = [];

        foreach($data as $d){
            $allNews[] = new \DAL_Class\News($d->url, $d->website, $d->title, $d->description, $d->date, $d->nbClics);
        }

        return $allNews;
    }
}