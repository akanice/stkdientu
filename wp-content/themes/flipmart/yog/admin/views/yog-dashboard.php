<?php
$demos = get_theme_support( 'yog-demos' )[0];
?>
<div class="yog-wrap">

	<div class="yog-dashboard">
        
		<?php require_once( get_template_directory().'/yog/admin/views/yog-header.php' ); ?>

		<div class="tab-content">
            <?php yog_action( 'before_admin_panel' ); ?>
			<div id="yog-general" role="tabpanel" class="yog-tab-pane yog-tab-is-active">

				<ul class="yog-cards-container clearfix">
                  
                  <li class="yog-card on-half">
                     <div class="yog-card-inner">
                        <p><?php echo esc_html__( 'We are a creative web design that specialized in WordPress and create awesome WordPress Theme to meet anyone needs. We are smart, intelligent, talented and best of all, we are super passionate about our work.', 'flipmart' )?></p>
                        <p><?php echo esc_html__( 'With our lots of talent and experience, we combine beautiful, modern designs with clean, functional code to produce stunning websites. A product that we offer help and guidance in using to each of our customers.', 'flipmart' ); ?></p>
                        <p><?php echo esc_html__( 'Follow us to stay up to date with our latest and greatest. We are working hard to bring you some perfect themes!', 'flipmart' ); ?></p>
                        <h2><?php echo esc_html__( 'Dedicated Support System', 'flipmart' ); ?></h2>
                        <p><?php echo esc_html__( 'We are always happy to help and we value our customers. All our files come with User Manual prepared specifically for each product, these help files are located inside your download packages.', 'flipmart' )?></p>
                        <div class="yog-card-footer clearfix">
                           <a class="yog-button" href="https://themeforest.net/user/ckthemes" target="_blank"><img src="<?php echo esc_url( yog()->load_assets( 'img/envato.png' ) ); ?>" alt="" /></a> 
                        </div>
                     </div>
                  </li>
                  
                  <li class="yog-card">
                     <div class="yog-card-inner">
                        <div class="yog-icon-container">
                           <i class="text-gradient fa fa-life-ring"></i>
                        </div>
                        <h3><?php echo esc_html__( 'Support Forums', 'flipmart' ) ?></h3>
                        <div class="yog-status yog-status-is-active">
                           <span><?php echo esc_html__( 'Community', 'flipmart' ) ?></span>
                        </div>
                        <div class="yog-card-footer clearfix">
                           <a class="yog-button" href="<?php echo esc_url( yog_helper()->yog_support_fourm_url() ); ?>" target="_blank"><span><?php echo esc_html__( 'Go to forums', 'flipmart' ) ?></span> <i class="fa fa-angle-right"></i></a>
                        </div>
                     </div>
                  </li>

                  <li class="yog-card">
                     <div class="yog-card-inner">
                        <div class="yog-icon-container">
                           <i class="text-gradient fa fa-file-text-o"></i>
                        </div>
                        <h3><?php echo esc_html__( 'Documentation', 'flipmart' ) ?></h3>
                        <div class="yog-status yog-status-is-active">
                           <span><?php echo esc_html__( 'Knowledge Base', 'flipmart' ) ?></span>
                        </div>
                        <div class="yog-card-footer clearfix">
                           <a class="yog-button" href="<?php echo esc_url( yog_helper()->yog_online_documentation_url() ); ?>" target="_blank"><span><?php echo esc_html__( 'Read Documentation', 'flipmart' ) ?></span> <i class="fa fa-angle-right"></i></a>
                        </div>
                     </div>
                  </li>

               </ul>
               <?php yog_action( 'after_admin_panel' ); ?>
			</div>

			<div id="yog-demos" role="tabpanel" class="yog-tab-pane">

				<?php if( !empty( $demos ) && class_exists('Yog_Addons') ) : ?>
					<ul class="yog-cards-container clearfix">
					<?php foreach( $demos as $id => $demo ): ?>
						<li class="yog-card yog-card-demo yog-card-is-active">
							<div class="yog-card-inner">
								<div class="yog-icon-container">
		                           <img src="<?php echo esc_url( $demo['screenshot'] ); ?>" alt="<?php echo esc_html( $demo['title'] ) ?>" />
		                        </div>
		                        <h3><?php echo esc_html( $demo['title'] ) ?></h3>
                                <div class="demo-loader" style="display: none;"></div>
                                <p><?php echo esc_html( $demo['description'] ); ?></p>
		                        <div class="yog-card-footer clearfix">
		                           <a class="yog-button" href="<?php echo esc_url( $demo['preview'] ); ?>" target="_blank"><span><?php echo esc_html__( 'Preview', 'flipmart' ) ?></span> <i class="fa fa-angle-right"></i></a>
		                           <a class="yog-button importer-btn" href="<?php echo admin_url( 'admin.php?page=yog&yog-import-demo='. $id ) ?>"><span><?php echo esc_html__( 'Import Demo', 'flipmart' ) ?></span> <i class="fa fa-angle-right"></i></a>
		                        </div>
		                    </div>
						</li>
					<?php endforeach; ?>
					</ul>
                <?php else: ?>   
                    <div class="notice demo inline notice-warning notice-alt"><p><?php echo esc_html__( 'Please install / activate STKhoadientu Core Addons plugin after that you can import theme demo contents', 'flipmart' )?></p></div> 
				<?php endif; ?>
			</div>
            
            <div id="yog-changelog" role="tabpanel" class="yog-tab-pane">
                <h3>1.2</h3>
                <p><strong>Released: 26th September 2017</strong></p>
                <p><strong>Bug Fixed</strong></p>
                <ul>
                    <li>Product grid columns extra space</li>
                    <li>Top bar menu login link redirect issue</li>
                    <li>Shop categories display issue</li>
                    <li>Theme options logo display issue</li>
                    <li>editor-style-rtl.css file admin area notification issue</li>
                    <li>Product Hot Deals widget date counter issue</li>
                    <li>One click demo importer improve</li>
                    <li>Unused images remove from demo data</li>
                    <li>Contact Form Seven summation email fields data issue</li>
                </ul>
                <p><strong>New Features</strong></p>
                <ul>
                    <li>Front end color style switcher</li>
                    <li>Theme options multi color skins generator</li>
                    <li>Boxed and Wide layout support</li>
                    <li>New RTL demo added</li>
                    <li>Single product slider images zoom out affect</li>
                    <li>Ajax based dropdown menu mini cart</li>
                    <li>WooCommerce Currency Switcher pro version included</li>
                    <li>Popup Plugin For WordPress - ConvertPlus pro version included</li>
                    <li>Visual Composer latest version included</li>
                    <li>New changelog tab added in theme dashboard</li>
                    <li><a href="https://www.youtube.com/watch?v=uO91k9s6vM0&index=1&list=PLYp76EP6RhnwOkp-TsZD8yFML1O1GPCIn" target="_blank">Youtub video tutorial series</a> released and its link added in theme dashboard</li>
                    <li>All demo content updated</li>
                </ul>
                <h3>1.1</h3>
                <p><strong>Released: 21th September 2017</strong></p>
                <ul>
                    <li>Currency switcher dropdown css issues fixed</li>
                    <li>Demo content updated</li>
                </ul>
                <h3>1.0</h3>
                <p><strong>Released: 12th September 2017</strong></p>
                <ul>
                    <li>Initial STKhoadientu WordPress Theme release</li>
                </ul>
            </div>

		</div>

	</div>

</div>
