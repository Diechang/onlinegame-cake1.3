<?php
class Titlesummary extends AppModel {
	var $name = 'Titlesummary';

	//Virtual Fields
//	var $VF = array(
//		'vote_count_vote'	=> 'SELECT COUNT( v.item1 ) FROM votes AS v WHERE v.title_id = Titlesummary.title_id AND v.public = 1 GROUP BY v.title_id',
//		'vote_count_review'	=> 'SELECT COUNT( v.review ) FROM votes AS v WHERE v.title_id = Titlesummary.title_id AND v.public = 1 GROUP BY v.title_id',
//		'vote_avg_item1'	=> 'SELECT AVG( v.item1 ) FROM votes AS v WHERE v.title_id = Titlesummary.title_id AND v.public = 1 GROUP BY v.title_id',
//		'vote_avg_item2'	=> 'SELECT AVG( v.item2 ) FROM votes AS v WHERE v.title_id = Titlesummary.title_id AND v.public = 1 GROUP BY v.title_id',
//		'vote_avg_item3'	=> 'SELECT AVG( v.item3 ) FROM votes AS v WHERE v.title_id = Titlesummary.title_id AND v.public = 1 GROUP BY v.title_id',
//		'vote_avg_item4'	=> 'SELECT AVG( v.item4 ) FROM votes AS v WHERE v.title_id = Titlesummary.title_id AND v.public = 1 GROUP BY v.title_id',
//		'vote_avg_item5'	=> 'SELECT AVG( v.item5 ) FROM votes AS v WHERE v.title_id = Titlesummary.title_id AND v.public = 1 GROUP BY v.title_id',
//		'vote_avg_item6'	=> 'SELECT AVG( v.item6 ) FROM votes AS v WHERE v.title_id = Titlesummary.title_id AND v.public = 1 GROUP BY v.title_id',
//		'vote_avg_item7'	=> 'SELECT AVG( v.item7 ) FROM votes AS v WHERE v.title_id = Titlesummary.title_id AND v.public = 1 GROUP BY v.title_id',
//		'vote_avg_item8'	=> 'SELECT AVG( v.item8 ) FROM votes AS v WHERE v.title_id = Titlesummary.title_id AND v.public = 1 GROUP BY v.title_id',
//		'vote_avg_item9'	=> 'SELECT AVG( v.item9 ) FROM votes AS v WHERE v.title_id = Titlesummary.title_id AND v.public = 1 GROUP BY v.title_id',
//		'vote_avg_item10'	=> 'SELECT AVG( v.item10 ) FROM votes AS v WHERE v.title_id = Titlesummary.title_id AND v.public = 1 GROUP BY v.title_id',
//		'vote_avg_all'		=> 'SELECT AVG( (v.item1 + v.item2 + v.item3 + v.item4 + v.item5 + v.item6 + v.item7 + v.item8 + v.item9 + v.item10) /10 ) FROM votes AS v WHERE v.title_id = Titlesummary.title_id AND v.public = 1 GROUP BY v.title_id',
//		'fansite_count'		=> 'SELECT COUNT(f.site_url) FROM fansites AS f WHERE f.title_id = Titlesummary.title_id AND f.public = 4 GROUP BY f.title_id',
//	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Title' => array(
			'className' => 'Title',
			'foreignKey' => 'title_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>