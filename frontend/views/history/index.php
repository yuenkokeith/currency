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

            <div class="col-lg-6 col-sm-6">

				<div id="app">
					<b-overlay :show="show" rounded="lg">
					    <div>
                            <b-form  @submit="onSubmit">
						        <b-form-group id="input-group-2" 
                                    label-cols-sm="2"
                                    label-cols-lg="2"
                                        content-cols-sm="7"
                                        content-cols-lg="7"
                                    label="Start At" label-for="input-2">
                                    <date-picker v-model="form.start_at" :config="{format: 'YYYY-MM-DD'}"></date-picker>
                                </b-form-group>

                                <b-form-group id="input-group-2" 
                                    label-cols-sm="2"
                                    label-cols-lg="2"
                                        content-cols-sm="7"
                                        content-cols-lg="7"
                                    label="End At" label-for="input-2">
                                    <date-picker v-model="form.end_at" :config="{format: 'YYYY-MM-DD'}"></date-picker>
                                </b-form-group>

                                <b-form-group id="input-group-2" 
                                    label-cols-sm="2"
                                    label-cols-lg="2"
                                        content-cols-sm="7"
                                        content-cols-lg="7"
                                    label="" label-for="input-2">
                                    <b-button type="submit" >Show History</b-button>
                                </b-form-group>

                            </b-form>
					    </div>
                       
                        <b-table-simple fixed hover small caption-top responsive>
                            <b-tbody>
                                <b-tr>
                                    <b-td variant="dark">Date</b-td>
                                    <b-td variant="dark"></b-td>
                                </b-tr>
                                <b-tr v-for="(value, name, index) in dataItems">
                                    <b-td variant="primary">{{ name }}</b-td>

                                    <b-td variant="primary">
                                        <b-table-simple fixed hover small caption-top responsive>
                                            <b-tr>
                                                <b-td variant="dark">Currency</b-td>
                                                <b-td variant="dark">Rate</b-td>
                                            </b-tr>
                                            <b-tr v-for="(rate, code, index) in value">
                                                <b-td variant="primary">
                                                    <b-link :href="'/currency/conversion?code='+code">{{ code }}</b-link>
                                                </b-td>
                                                <b-td variant="primary">
                                                   {{ rate }}
                                                </b-td>
                                            </b-tr>
                                        </b-table-simple>
                                    </b-td>



                                </b-tr>
                            </b-tbody>
                        </b-table-simple>

                        <!-- show response message -->
                        <b-modal id="message" no-close-on-backdrop cancelDisabled centered ok-only title="System Message">
                            <p class="my-4 text-center">{{ message}}</p>
                        </b-modal>

                    </b-overlay>
			
				</div>
				<!-- vuejs components -->

			</div>

		</div>

        
    </div>
</div>
