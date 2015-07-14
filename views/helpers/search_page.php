<?php
/*
 * 検索ページ用ヘルパー
 */
class SearchPageHelper extends AppHelper
{
	//Use Helper
	var $helpers = array('Html');

	var $others = array(
					"free" => "基本プレイは無料がいい",
					"vote" => "みんなの評価やレビューが見たい",
					"fansite" => "攻略サイトやファンサイトも見てみたい",
				);
	var $orders = array(
					"rating" => "評価の高い順",
					"start" => "サービス開始順<span>（正式サービス前のタイトルは後ろに表示されます）</span>",
					"name" => "タイトル名順<span>（A～Z、あ～お）</span>",
				);

	var $urlParamStrings = null;

	/**
	 * チェックボックス
	 *
	 * @param	array	$item
	 * @param	string	$model
	 * @param	string	$controler
	 * @return	html
	 * @access	public
	 */
	function checkList($item , $model , $controller)
	{
//		pr($this->params);
//		exit;
		$checked = "";
		if(!empty($this->params["url"][strtolower($model)]) && in_array($item[$model]["id"] , $this->params["url"][strtolower($model)]))
		{
			$checked = ' checked=="checked"';
		}
		$src = "";
		$src .= '<li><input type="checkbox" name="' . strtolower($model) . '[]" value="' . $item[$model]["id"] . '"' . $checked . ' />' . "\n";
		$src .= $this->Html->link($item[$model]["str"] , array("controller" => $controller , "action" => "index" , "path" => $item[$model]["path"] , "ext" => "html")) . "</li>\n";
		return $src;
	}

	/**
	 * ついでに（その他）チェックボックス
	 *
	 * @return html
	 * @access public
	 */
	function otherCheckList()
	{
		$src = "";
		foreach($this->others as $key => $val)
		{
			$checked = (!empty($this->params["url"][$key])) ? ' checked="checked"' : '';
			$src .= '<li><input type="checkbox" name="' . $key . '"' . $checked . ' /> ' . $val . '</li>' . "\n";
		}
		return $src;
	}

	/**
	 * 並び順チェックボックス
	 *
	 * @return html
	 * @access public
	 */
	function orderCheckList()
	{
		$src	= "";
		$count	= 0;
		foreach($this->orders as $key => $val)
		{
			if($count == 0)
			{
				$checked = (!isset($this->params["url"]["order"]) || $this->params["url"]["order"] == $key) ? ' checked="checked"' : '';
			}
			else
			{
				$checked = (isset($this->params["url"]["order"]) && $this->params["url"]["order"] == $key) ? ' checked="checked"' : '';
			}
			$src .= '<li><input type="radio" name="order" value="' . $key . '"' . $checked . ' /> ' . $val . '</li>' . "\n";
			$count++;
		}
		return $src;
	}

	/**
	 * ページング
	 *
	 * @param	array	$urlParams
	 * @param	array	$paging[count, pages, page, start, end, limit]
	 * @return	html
	 * @access	public
	 */
	function paging(&$urlParams , &$paging)
	{
		$resultUrl = "/search/result?" . $this->getUrlParamStrings($urlParams);

		$src = '';
		$src .= '<p class="paging">' . "\n";
		//prev
		if($paging["page"] > 1)
		{
			$src .= '<span><a href="' . $resultUrl . '&page=' . ($paging["page"] - 1) . '">≪前の' . $paging["limit"] . '件</a></span>';
		}
		for($i = 1; $i <= $paging["pages"]; $i++)
		{
			if($i == $paging["page"])
			{
				$src .= '<span class="current">' . $i . '</span>';
			}
			else
			{
				$src .= '<span><a href="' . $resultUrl . '&page=' . $i . '">' . $i . '</a></span>';
			}
		}
		//next
		if($paging["page"] < $paging["pages"])
		{
			$src .= '<span><a href="' . $resultUrl . '&page=' . ($paging["page"] + 1) . '">次の' . $paging["limit"] . '件≫</a></span>';
		}
		$src .= '</p>' . "\n";
		return $src;
//	<p class="paging">
//		<span><a href="#">≪前の10件</a></span>
//		<span>1</li>
//		<span><a href="#">2</a></span>
//		<span><a href="#">3</a></span>
//		<span><a href="#">4</a></span>
//		<span><a href="#">≫次の10件</a></span>
//	</p>
	}

	/**
	 * URLパラメタ
	 *
	 * @param	array	$urlParams
	 * @return	string	$this->urlParamStrings
	 * @access	private
	 */
	private function getUrlParamStrings(&$urlParams)
	{
		if(isset($this->urlParamStrings))
		{
			return $this->urlParamStrings;
		}
		else
		{
			$paramsArray = array();
			foreach($urlParams as $paramKey => $paramVal)
			{
				if(is_array($paramVal))
				{
					foreach($paramVal as $val)
					{
						$paramsArray[] = urlencode($paramKey . '[]') . '=' . urlencode($val);
					}
				}
				else
				{
					$paramsArray[] = urlencode($paramKey) . '=' . urlencode($paramVal);
				}
			}
			$this->urlParamStrings = implode('&' , $paramsArray);
			return $this->urlParamStrings;
		}
	}
}
?>