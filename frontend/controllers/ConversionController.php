<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\ProductAnalysis;
use common\models\ReceiptProduct;
use yii\helpers\Json;

/**
 * Conversion controller
 */
class ConversionController extends BaseController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionHotProductOverall() {
        //http://localhost/datachart/chart/hot-product-overall
        $sql = "SELECT brand, receipt_prod_item, receipt_prod_ref, receipt_prod_amt, product_analysis.qt_category1, 
		        product_analysis.qt_category2, product_analysis.qt_category3,
		        count(receipt_prod_ref) as 'qty', sum(receipt_prod_amt) as 'total' 
		        FROM receipt_product left join product_analysis on receipt_product.receipt_recid = product_analysis.receipt_record_id
		        group by receipt_prod_amt, receipt_prod_ref, brand, receipt_prod_item, product_analysis.qt_category1,
		        product_analysis.qt_category2, product_analysis.qt_category3
		        order by total desc";

       $ReceiptProductOverAll = ReceiptProduct::findBySql($sql)->asArray()->all();

       $overJson = JSON::encode($ReceiptProductOverAll);
       return $overJson;
	}

    public function actionHotProductNewProducts() {
        //http://localhost/datachart/chart/hot-product-new-products
        $sql = "SELECT brand, receipt_prod_item, receipt_prod_ref, receipt_prod_amt, product_analysis.qt_category1, 
		        product_analysis.qt_category2, product_analysis.qt_category3,
		        count(receipt_prod_ref) as 'qty', sum(receipt_prod_amt) as 'total' 
		        FROM receipt_product left join product_analysis on receipt_product.receipt_recid = product_analysis.receipt_record_id
				where product_analysis.new_product=1
		        group by receipt_prod_amt, receipt_prod_ref, brand, receipt_prod_item, product_analysis.qt_category1,
		        product_analysis.qt_category2, product_analysis.qt_category3
		        order by total desc";

       $ReceiptProductOverAll = ReceiptProduct::findBySql($sql)->asArray()->all();

       $overJson = JSON::encode($ReceiptProductOverAll);
       return $overJson;
	}

    public function actionHotProductFemale() {
        //http://localhost/datachart/chart/hot-product-female
        $sql = "SELECT brand, receipt_prod_item, receipt_prod_ref, receipt_prod_amt, product_analysis.qt_category1, 
		        product_analysis.qt_category2, product_analysis.qt_category3,
		        count(receipt_prod_ref) as 'qty', sum(receipt_prod_amt) as 'total' 
		        FROM receipt_product left join product_analysis on receipt_product.receipt_recid = product_analysis.receipt_record_id
				where product_analysis.qt_category1 = '女士'
		        group by receipt_prod_amt, receipt_prod_ref, brand, receipt_prod_item, product_analysis.qt_category1,
		        product_analysis.qt_category2, product_analysis.qt_category3
		        order by total desc";

       $ReceiptProductOverAll = ReceiptProduct::findBySql($sql)->asArray()->all();

       $overJson = JSON::encode($ReceiptProductOverAll);
       return $overJson;
	}

    public function actionHotProductMale() {
        //http://localhost/datachart/chart/hot-product-male
        $sql = "SELECT brand, receipt_prod_item, receipt_prod_ref, receipt_prod_amt, product_analysis.qt_category1, 
		        product_analysis.qt_category2, product_analysis.qt_category3,
		        count(receipt_prod_ref) as 'qty', sum(receipt_prod_amt) as 'total' 
		        FROM receipt_product left join product_analysis on receipt_product.receipt_recid = product_analysis.receipt_record_id
				where product_analysis.qt_category1='男士'
		        group by receipt_prod_amt, receipt_prod_ref, brand, receipt_prod_item, product_analysis.qt_category1,
		        product_analysis.qt_category2, product_analysis.qt_category3
		        order by total desc";

       $ReceiptProductOverAll = ReceiptProduct::findBySql($sql)->asArray()->all();

       $overJson = JSON::encode($ReceiptProductOverAll);
       return $overJson;
	}

    public function actionHotProductHandbags() {
        //http://localhost/datachart/chart/hot-product-handbags
        $sql = "SELECT brand, receipt_prod_item, receipt_prod_ref, receipt_prod_amt, product_analysis.qt_category1, 
		        product_analysis.qt_category2, product_analysis.qt_category3,
		        count(receipt_prod_ref) as 'qty', sum(receipt_prod_amt) as 'total' 
		        FROM receipt_product left join product_analysis on receipt_product.receipt_recid = product_analysis.receipt_record_id
				where product_analysis.qt_category2='包袋'
		        group by receipt_prod_amt, receipt_prod_ref, brand, receipt_prod_item, product_analysis.qt_category1,
		        product_analysis.qt_category2, product_analysis.qt_category3
		        order by total desc";

       $ReceiptProductOverAll = ReceiptProduct::findBySql($sql)->asArray()->all();

       $overJson = JSON::encode($ReceiptProductOverAll);
       return $overJson;
	}

    public function actionHotProductReadytowear() {
        //http://localhost/datachart/chart/hot-product-readytowear
        $sql = "SELECT brand, receipt_prod_item, receipt_prod_ref, receipt_prod_amt, product_analysis.qt_category1, 
		        product_analysis.qt_category2, product_analysis.qt_category3,
		        count(receipt_prod_ref) as 'qty', sum(receipt_prod_amt) as 'total' 
		        FROM receipt_product left join product_analysis on receipt_product.receipt_recid = product_analysis.receipt_record_id
				where product_analysis.qt_category2='成衣'
		        group by receipt_prod_amt, receipt_prod_ref, brand, receipt_prod_item, product_analysis.qt_category1,
		        product_analysis.qt_category2, product_analysis.qt_category3
		        order by total desc";

       $ReceiptProductOverAll = ReceiptProduct::findBySql($sql)->asArray()->all();

       $overJson = JSON::encode($ReceiptProductOverAll);
       return $overJson;
	}

    public function actionHotProductShoes() {
        //http://localhost/datachart/chart/hot-product-shoes
        $sql = "SELECT brand, receipt_prod_item, receipt_prod_ref, receipt_prod_amt, product_analysis.qt_category1, 
		        product_analysis.qt_category2, product_analysis.qt_category3,
		        count(receipt_prod_ref) as 'qty', sum(receipt_prod_amt) as 'total' 
		        FROM receipt_product left join product_analysis on receipt_product.receipt_recid = product_analysis.receipt_record_id
				where product_analysis.qt_category2='�?
		        group by receipt_prod_amt, receipt_prod_ref, brand, receipt_prod_item, product_analysis.qt_category1,
		        product_analysis.qt_category2, product_analysis.qt_category3
		        order by total desc";

       $ReceiptProductOverAll = ReceiptProduct::findBySql($sql)->asArray()->all();

       $overJson = JSON::encode($ReceiptProductOverAll);
       return $overJson;
	}

    public function actionHotProductJewllery() {
        //http://localhost/datachart/chart/hot-product-jewllery
        $sql = "SELECT brand, receipt_prod_item, receipt_prod_ref, receipt_prod_amt, product_analysis.qt_category1, 
		        product_analysis.qt_category2, product_analysis.qt_category3,
		        count(receipt_prod_ref) as 'qty', sum(receipt_prod_amt) as 'total' 
		        FROM receipt_product left join product_analysis on receipt_product.receipt_recid = product_analysis.receipt_record_id
				where product_analysis.qt_category2='珠宝'
		        group by receipt_prod_amt, receipt_prod_ref, brand, receipt_prod_item, product_analysis.qt_category1,
		        product_analysis.qt_category2, product_analysis.qt_category3
		        order by total desc";

       $ReceiptProductOverAll = ReceiptProduct::findBySql($sql)->asArray()->all();

       $overJson = JSON::encode($ReceiptProductOverAll);
       return $overJson;
	}

    public function actionHotProductWatches() {
        //http://localhost/datachart/chart/hot-product-watches
        $sql = "SELECT brand, receipt_prod_item, receipt_prod_ref, receipt_prod_amt, product_analysis.qt_category1, 
		        product_analysis.qt_category2, product_analysis.qt_category3,
		        count(receipt_prod_ref) as 'qty', sum(receipt_prod_amt) as 'total' 
		        FROM receipt_product left join product_analysis on receipt_product.receipt_recid = product_analysis.receipt_record_id
				where product_analysis.qt_category2='腕表'
		        group by receipt_prod_amt, receipt_prod_ref, brand, receipt_prod_item, product_analysis.qt_category1,
		        product_analysis.qt_category2, product_analysis.qt_category3
		        order by total desc";

       $ReceiptProductOverAll = ReceiptProduct::findBySql($sql)->asArray()->all();

       $overJson = JSON::encode($ReceiptProductOverAll);
       return $overJson;
	}

    public function actionTopCategory() {

        //http://localhost/datachart/chart/top-category
        $sql = "SELECT product_analysis.qt_category1, product_analysis.qt_category2, product_analysis.qt_category3, 
		        count(receipt_prod_ref) as 'qty', sum(receipt_prod_amt) as 'total',
				(b.thismonth / a.lastmonth) as 'percentage'
		        FROM receipt_product left join product_analysis on receipt_product.receipt_recid = product_analysis.receipt_record_id,
				 (SELECT Count(*) AS lastmonth
				 FROM receipt_product left join product_analysis on receipt_product.receipt_recid = product_analysis.receipt_record_id
				  WHERE receipt_date between '2020-11-01' AND '2020-11-31'
				 group by product_analysis.qt_category1, product_analysis.qt_category2, product_analysis.qt_category3) a,

				 (SELECT Count(*) AS thismonth
				 FROM receipt_product left join product_analysis on receipt_product.receipt_recid = product_analysis.receipt_record_id 
				 WHERE receipt_date between '2020-12-01' AND '2020-12-31'
				 group by product_analysis.qt_category1, product_analysis.qt_category2, product_analysis.qt_category3) b
		        group by product_analysis.qt_category1, product_analysis.qt_category2, product_analysis.qt_category3, b.thismonth, a.lastmonth
		        order by total desc";

       $ReceiptProductOverAll = ReceiptProduct::findBySql($sql)->asArray()->all();

       $overJson = JSON::encode($ReceiptProductOverAll);
       return $overJson;

    }

    public function getTotalSpending() {

        //http://localhost/datachart/chart/total-spending
        $sql = "SELECT product_analysis.qt_category2 , sum(receipt_prod_amt) as 'total' 
		        FROM receipt_product left join product_analysis on receipt_product.receipt_recid = product_analysis.receipt_record_id
				where product_analysis.qt_category2 in ('包袋', '成衣', '配饰', '�?, '珠宝', '腕表')
		        group by product_analysis.qt_category2
		        order by product_analysis.qt_category2 asc";

       $ReceiptProductOverAll = ReceiptProduct::findBySql($sql)->asArray()->all();

       //$overJson = JSON::encode($ReceiptProductOverAll);
       return $ReceiptProductOverAll;

    }
	
	public function getTotalSpendingByBrand($brand) {

        //http://localhost/datachart/chart/total-spending-by-brand
		
        $sql = "SELECT product_analysis.qt_category2 , sum(receipt_prod_amt) as 'total' 
		        FROM receipt_product left join product_analysis on receipt_product.receipt_recid = product_analysis.receipt_record_id
				where brand='" . $brand . "' and product_analysis.qt_category2 in ('包袋', '成衣', '配饰', '�?, '珠宝', '腕表')
		        group by product_analysis.qt_category2
		        order by product_analysis.qt_category2 asc";

       $ReceiptProductOverAll = ReceiptProduct::findBySql($sql)->asArray()->all();

       //$overJson = JSON::encode($ReceiptProductOverAll);
       return $ReceiptProductOverAll;

    }

	public function getNoOfProductSold(){
		
		$sql ="SELECT product_analysis.qt_category2 , count(product_analysis.qt_category2) as 'qty', sum(receipt_prod_amt) as 'total' 
		        FROM receipt_product left join product_analysis on receipt_product.receipt_recid = product_analysis.receipt_record_id
				where product_analysis.qt_category2 in ('包袋', '成衣', '配饰', '�?, '珠宝', '腕表')
		        group by product_analysis.qt_category2
		        order by total desc";
				
		$ReceiptProductOverAll = ReceiptProduct::findBySql($sql)->asArray()->all();

        return $ReceiptProductOverAll;
	}

    public function actionTopCategorySubDetail() {
        
		$qt_category1 = Yii::$app->request->post('qt_category1');
		$qt_category2 = Yii::$app->request->post('qt_category2');
		$qt_category3 = Yii::$app->request->post('qt_category3');
		
        //http://localhost/datachart/chart/top-category-sub-detail
        $sql = "SELECT brand, receipt_prod_item, receipt_prod_ref, receipt_prod_amt, product_analysis.qt_category1, 
		        product_analysis.qt_category2, product_analysis.qt_category3,
		        count(receipt_prod_ref) as 'qty', sum(receipt_prod_amt) as 'total' 
		        FROM receipt_product left join product_analysis on receipt_product.receipt_recid = product_analysis.receipt_record_id
				where product_analysis.qt_category1='" . $qt_category1 . "' and product_analysis.qt_category2='" . $qt_category2 . "' and product_analysis.qt_category3='" . $qt_category3 . "'
		        group by product_analysis.qt_category1, product_analysis.qt_category2, product_analysis.qt_category3, 
				receipt_prod_amt, receipt_prod_ref, brand, receipt_prod_item,
		        product_analysis.qt_category2, product_analysis.qt_category3
		        order by total desc";

       $ReceiptProductOverAll = ReceiptProduct::findBySql($sql)->asArray()->all();

       $overJson = JSON::encode($ReceiptProductOverAll);
       return $overJson;

    }
	
	public function actionBrandProductPerformance() {
        //http://localhost/datachart/chart/brand-product-performance
		$brand = Yii::$app->request->post('brand');
		
        $sql = "SELECT brand, receipt_prod_item, receipt_prod_ref, receipt_prod_amt, product_analysis.qt_category1, 
		        product_analysis.qt_category2, product_analysis.qt_category3,
		        count(receipt_prod_ref) as 'qty', sum(receipt_prod_amt) as 'total' 
		        FROM receipt_product left join product_analysis on receipt_product.receipt_recid = product_analysis.receipt_record_id
				where brand='" . $brand . "'
		        group by receipt_prod_amt, receipt_prod_ref, brand, receipt_prod_item, product_analysis.qt_category1,
		        product_analysis.qt_category2, product_analysis.qt_category3
		        order by total desc";

       $ReceiptProductOverAll = ReceiptProduct::findBySql($sql)->asArray()->all();

       $overJson = JSON::encode($ReceiptProductOverAll);
       return $overJson;
	}
	
    public function actionP1b()
    {
        return $this->render('p1b');
    }

    public function actionP1c()
    {
        $totalSpending = $this->getTotalSpending();
		$noOfProductSold = $this->getNoOfProductSold();
	
        return $this->render('p1c', 
                                array("totalSpending" => $totalSpending, "noOfProductSold" => $noOfProductSold)
                            );
    }

    public function actionP2a()
    {
        return $this->render('p2a');
    }

    public function actionP2b()
    {
        return $this->render('p2b');
    }

}
