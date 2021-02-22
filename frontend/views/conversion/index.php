<?php

/* @var $this yii\web\View */

$this->title = 'Currency Exchange App';

$this->registerJsFile(
    '@web/js/' . Yii::$app->controller->id .'/index.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);

?>
<div class="site-index">

    <div class="body-content">


		<div class="row">

            <div class="col-lg-4 col-sm-4">

				<div id="app">
                    <b-overlay :show="show" rounded="lg">
					    <div>
						    <b-form-group id="input-group-3" 
                                label-cols-sm="3"
                                label-cols-lg="3"
                                    content-cols-sm="4"
                                    content-cols-lg="4"
                                label="Currency:" label-for="input-3">
                                <b-form-select
                                    id="input-3"
                                    v-model="form.currency"
                                    :options="currencyOptions"
                                    required
								    @change="updateCurrency"
                                ></b-form-select>
                            </b-form-group>
					    </div>

                        <b-table-simple fixed hover small caption-top responsive>
                            <b-tbody>
                                <b-tr>
                                    <b-td variant="dark">Currency</b-td>
                                    <b-td variant="dark">Rate</b-td>
                                </b-tr>
                                <b-tr v-for="(value, name, index) in dataItems">
                                    <b-td variant="primary">{{ name }}</b-td>
                                    <b-td variant="primary">{{ value }}</b-td>
                                </b-tr>
                            </b-tbody>
                        </b-table-simple>
                    </b-overlay>
				</div>
				
			</div>

		</div>

        

    </div>
</div>
