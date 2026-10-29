<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Usage extends AppModel {

    /**

     * Overridden paginate method – group by week, away_team_id and home_team_id

     */
    /*function paginate(Model $model, $conditions, $fields, $order, $limit, $page = 1, $recursive = null, $extra = array()) {

        $recursive = -1;

        $group = $fields = array('locations.location_name', 'locations.location_city', 'home_team_id');

        return $this->find('all', compact('conditions', 'fields', 'order', 'limit', 'page' ’, 'recursive', 'group'));
    }*/

    /**

     * Overridden paginateCount method

     */
    /*function paginateCount(Model $model, $conditions = null, $recursive = 0, $extra = array()) {

        $sql = "select `hotspot_admin`.`locations`.`location_name` AS `location_name`,`hotspot_admin`.`locations`.`location_city` AS `location_city`,`hotspot_admin`.`locations`.`live_date` AS `live_date`,`hotspot_admin`.`locations`.`revenue_share` AS `revenue_share`,`hotspot_admin`.`locations`.`one_time` AS `one_time`,(select count(0) from `hotspot_admin`.`coupons` where ((`hotspot_admin`.`coupons`.`location_id` = `hotspot_admin`.`locations`.`id`) and (`hotspot_admin`.`coupons`.`activated` = 1) and (`hotspot_admin`.`coupons`.`active_date` > date_format(now(),'%Y-%m-01')))) AS `coupons` from `hotspot_admin`.`locations`";

        $this->recursive = $recursive;

        $results = $this->query($sql);

        return count($results);
    }*/

}

?>