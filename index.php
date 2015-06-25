<?php
session_start();
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
<title>Healthy Directions | Creative Brief</title>
<link rel="icon" href="img/favicon.ico" />
<link rel="apple-touch-icon" href="http://creativebrief.healthydirections.com/img/touch-icon-iphone.png">
<link rel="apple-touch-icon" sizes="76x76" href="http://creativebrief.healthydirections.com/img/touch-icon-ipad.png">
<link rel="apple-touch-icon" sizes="120x120" href="http://creativebrief.healthydirections.com/img/touch-icon-iphone-retina.png">
<link rel="apple-touch-icon" sizes="152x152" href="http://creativebrief.healthydirections.com/img/touch-icon-ipad-retina.png">
<link rel="apple-touch-icon" sizes="180x180" href="http://creativebrief.healthydirections.com/img/touch-icon-iphone6-retina.png">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-title" content="Creative Brief">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800|Montserrat:400,700" />
<link rel="stylesheet" href="css/foundation.css" />
<link rel="stylesheet" href="css/foundation-icons.css" />
<link rel="stylesheet" href="css/foundation-datepicker.css" />
<link rel="stylesheet" href="css/layout.css">
<script src="js/vendor/modernizr.js"></script>
</head>
<body>
<?php include('modals.php');?>
<?php include('header.php');?>
<form id="request_form" data-abide="ajax" enctype="multipart/form-data" method="post" action="php/process.php">
  <div class="row toggle-full-width">
    <div class="large-12 columns">
      <?php 
      /* display jobsuite errors */
      if( isset($_GET['m']) && isset($_SESSION['error']) && $_SESSION['error'] != ""){ ?>
        <div data-alert class="add-top alert-box alert radius remove-bottom"><?php echo $_SESSION['error'];unset($_SESSION['error']); ?> <a href="#" class="close">&times;</a></div>
      <?php
        }
      ?>
      <h4 class="right"><small><em>* = Required</em></small></h4>
      <h4><br>Project Information</h4>
      <hr>
      <div id="section_1">
        <div class="row">
          <div class="medium-6 columns">
            <label for="email"><span class="label error alert right radius">Required</span><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="The email address of the individual who is requesting the job.&lt;br&gt;&lt;small&gt;&lt;em&gt;This field is required.&lt;/em&gt;&lt;/small&gt;"> Requested By*</strong>
              <input id="email" name="email" type="email" placeholder="Email address" class="radius" required>
              <input name="email_address" type="hidden" value="">
            </label>
          </div>
          <div class="medium-6 columns">
            <div class="row">
              <div class="small-6 columns">
                <label for="job_type_new"><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="Select this option if the type of job being requested is a new job.&lt;br&gt;&lt;small&gt;&lt;em&gt;This field is required.&lt;/em&gt;&lt;/small&gt;"> Is this a new job?*</strong></label>
                <div class="switch radius with-label"> <span class="label error alert right radius">Required</span>
                  <input name="job_type" id="job_type_new" value="New Job" type="radio" required>
                  <label for="job_type_new"><span class="active">YES</span><span class="inactive">NO</span></label>
                </div>
              </div>
              <div class="small-6 columns">
                <label for="job_type_revision"><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="Select this option if a previous job needs revisions.&lt;br&gt;&lt;small&gt;&lt;em&gt;This field is required.&lt;/em&gt;&lt;/small&gt;"> Is this a revision?*</strong></label>
                <div class="switch radius with-label"><span class="label error alert right radius">Required</span>
                  <input name="job_type" id="job_type_revision" value="Revision" type="radio" required>
                  <label for="job_type_revision"><span class="active">YES</span><span class="inactive">NO</span></label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="small-6 medium-3 columns">
            <label><span class="label error alert right radius">Required</span><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="Select the brand for the job. Example: Healthy Directions&lt;br&gt;&lt;small&gt;&lt;em&gt;This field is required.&lt;/em&gt;&lt;/small&gt;"> Brand*</strong>
              <select name="brand" class="radius" required>
                <option value="">Select brand</option>
                <option value="PAN">All Brands</option>
                <option value="LARK">Dr. Lark</option>
                <option value="HD-PRG">Dr. Pergolizzi</option>
                <option value="SIN">Dr. Sinatra</option>
                <option value="HD-TAB">Dr. Tabor</option>
                <option value="WHIT">Dr. Whitaker</option>
                <option value="WMS">Dr. Williams</option>
                <option value="HD-WUR">Dr. Wurtman</option>
                <option value="HD-XU">Dr. Xu</option>
                <option value="HD">Healthy Directions</option>
                <option value="HD-HoT">Helen of Troy</option>
                <option value="HD-TRL">Trilane</option>
              </select>
            </label>
          </div>
          <div class="medium-3 small-6 columns">
            <label for="channel_type"><span class="label error alert right radius">Required</span><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="Select the type of channel needed for the job.&lt;br&gt;&lt;small&gt;&lt;em&gt;This field is required.&lt;/em&gt;&lt;/small&gt;"> Channel Type*</strong>
              <select id="channel_type" name="channel_type" class="radius" required>
                <option value="">Select Channel Type</option>
                <option value="Print">Print</option>
                <option value="Web">Web</option>
              </select>
            </label>
          </div>
          <div class="small-6 medium-3 columns">
            <label for="vehicle"><span class="label error alert right radius">Required</span><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="Based off the Channel Type, select the type of vehicle needed for the project.&lt;br&gt;&lt;small&gt;&lt;em&gt;This field is required.&lt;/em&gt;&lt;/small&gt;"> Vehicle*</strong>
              <select id="vehicle" name="vehicle" class="radius" required disabled>
                <option value="">Select Vehicle</option>
              </select>
            </label>
          </div>
          <div class="small-6 medium-3 columns">
            <label><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="This field provides a unique identification for the project name."> Project Tag</strong>
              <input name="tag" class="radius" type="text" placeholder="Example: Product Name, Sale Series">
            </label>
          </div>
        </div>
        <div class="row">
          <div class="small-6 medium-3 columns">
            <label for="due_date"><span class="label error alert right radius">Required</span><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="This is the date in which the job is to be completed.&lt;br&gt;&lt;small&gt;&lt;em&gt;This field is required.&lt;/em&gt;&lt;/small&gt;"> Due Date*</strong></label>
            <div class="row collapse postfix-radius">
              <div class="small-10 columns">
                <input id="due_date" name="due_date" type="text" value="" placeholder="MM/DD/YYYY" required>
              </div>
              <div class="small-2 columns"><a href="#" class="calendar button postfix"><i class="fi-calendar"></i></a></div>
            </div>
          </div>
          <div class="small-6 medium-3 columns">
            <label for="broadcast_date"><span class="label error alert right radius">Required</span><strong data-tooltip="data-tooltip" aria-haspopup="true" class="fi-info has-tip radius" title="This is the date in which the job will go live.&lt;br&gt;&lt;small&gt;&lt;em&gt;This field is required.&lt;/em&gt;&lt;/small&gt;"> In Home/Broadcast Date*</strong></label>
            <div class="row collapse postfix-radius">
              <div class="small-10 columns">
                <input id="broadcast_date" name="broadcast_date" type="text" placeholder="MM/DD/YYYY" value="" disabled required>
              </div>
              <div class="small-2 columns"><a href="#" class="calendar button postfix"><i class="fi-calendar"></i></a></div>
            </div>
          </div>
          <div class="medium-3 small-6 columns">
            <label for="effort"><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="What kind of effort is this?"> Effort Type</strong>
              <select id="effort" name="effort" class="radius">
                <option value="">Select Effort Type</option>
                <option>Alternative Media</option>
                <option>Aquisition</option>
                <option>Loyalty/Retention</option>
                <option>AutoDelivery</option>
                <option>Product Launch</option>
                <option>Product Line Extension</option>
                <option>Other</option>
              </select>
            </label>
          </div>
          <div class="medium-3 small-6 columns">
            <label><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="This is auto-populated for convenience."> Project Name</strong>
              <input class="radius" type="hidden" name="project_name">
              <input class="radius" type="text" name="tmp_project_name" disabled placeholder="BRAND-YYMMDD-VEHICLE-TAG" >
            </label>
          </div>
        </div>
        <div class="row">
          <div class="medium-6 columns">
            <label><span class="label error alert right radius">Required</span><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="Brief (one paragraph or 2-3 bullet points) description of project &amp; goals. What should the project communicate?  Test, upgrade, clearance sale, AutoDelivery promo, etc...&lt;br&gt;&lt;small&gt;&lt;em&gt;This field is required.&lt;/em&gt;&lt;/small&gt;"> Project Description*</strong>
              <textarea name="project_desc" class="radius medium" placeholder="A brief (one paragraph or 2-3 bullet points) description of project &amp; goals. What should the project communicate?  Test, upgrade, clearance sale, AutoDelivery promo, etc..." required></textarea>
            </label>
          </div>
          <div class="medium-6 columns">
            <label><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="Acquire new customers, upgrade retention customer..."> Marketing Objectives</strong>
              <textarea name="marketing_obj" class="small radius" placeholder="Acquire new customers, upgrade retention customer..."></textarea>
            </label>
            <div class="row">
              <div class="medium-12 columns">
                <label for="copywriting"><span class="label error alert right radius">Required</span><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="Specify weather this project requires copywriting, copy review, or none."> Does this project require copywriting or copy review?</strong>
                  <select id="copywriting" name="copywriting" class="radius hide" required disabled>
                    <option value="">Copywriting Type</option>
                    <option>New Copywriting</option>
                    <option>Copy Review</option>
                  </select>
                </label>
                <div class="switch with-label radius">
                  <input id="is_copywriting" name="is_copywriting" value="Yes" type="checkbox" data-toggle-visibility="#copywriting" >
                  <label for="is_copywriting"><span class="active">YES</span><span class="inactive">NO</span></label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="medium-6 columns">
            <label for="campaign"><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="What strategic prioritiy does this project tie to?  Include JobSuite related number if applicable."> Is this part of a larger effort/campaign?</strong>
              <textarea id="campaign" name="campaign" class="radius small hide half-bottom" placeholder="What strategic prioritiy does this project tie to?  Include JobSuite related number if applicable."></textarea>
            </label>
            <div class="switch with-label radius">
              <input id="is_campaign" name="is_campaign" value="Yes" type="checkbox" data-toggle-visibility="#campaign" >
              <label for="is_campaign"><span class="active">YES</span><span class="inactive">NO</span></label>
            </div>
          </div>
          <div class="medium-6 columns">
            <label for="variations"><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="Describe the testing details."> Is this a test or require any variations?</strong>
              <textarea id="variations" name="variations" class="radius small hide half-bottom" placeholder="Testing details"></textarea>
            </label>
            <div class="switch with-label radius">
              <input id="is_test" name="is_test" value="Yes" type="checkbox" data-toggle-visibility="#variations" >
              <label for="is_test"><span class="active">YES</span><span class="inactive">NO</span></label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="medium-6 columns">
            <label for="behavior"><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="What action do you want the audience to take? Please list key insights. What are the motivators/triggers believed to make them act? What emotion can we connect with?"> What are the desired customer behavior/insights?</strong>
              <textarea id="behavior" name="behavior" class="small radius" placeholder="What action do you want the audience to take? Please list key insights. What are the motivators/triggers believed to make them act? What emotion can we connect with?"></textarea>
            </label>
          </div>
          <div class="medium-6 columns">
            <label for="business_goal"><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="Revenue generating, test, cost savings, etc..."> Business Goal</strong>
              <textarea id="business_goal" name="business_goal" class="small radius" placeholder="Revenue generating, test, cost savings, etc..."></textarea>
            </label>
          </div>
        </div>
        <div class="row">
          <div class="medium-6 columns">
            <label for="considerations"><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="Identify any suggested, or required, considerations that may impact format, copy, or design."> Creative Considerations (watchouts, manditories, must-haves)</strong>
              <textarea name="considerations" id="considerations" class="small radius" placeholder="Identify any suggested, or required, considerations that may impact format, copy, or design."></textarea>
            </label>
          </div>
          <div class="medium-6 columns">
            <label for="notes"><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="Traffic notes or other information."> Additional Notes/Instructions</strong>
              <textarea name="notes" id="notes" class="small radius" placeholder="Traffic notes or other information."></textarea>
            </label>
          </div>
        </div>
        <div class="row">
          <div class="medium-6 columns" id="filefields">
            <label>
            <strong data-tooltip aria-haspopup="true" class="fi-info has-tip" title="Upload as many resource files as needed. If files reside in different directories, use the &ldquo;Add more files...&rdquo; button to add additional file fields. &lt;br&gt;&lt;small&gt;&lt;em&gt;The maximum upload file size is 2GB.&lt;/em&gt;&lt;/small&gt;"> File Attachments (Resources, Past Results, Benchmarks, etc...)</strong> 
            
            </label><div class="upload-container text-center hide"><i class="fi-magnifying-glass"></i> Browse for files...<span class="number-of-files"></span>
              <input type="file" name="myfiles[]" multiple capture="camera">
            </div>
            <div class="upload-container text-center"><i class="fi-magnifying-glass"></i> Browse for files...<span class="number-of-files"></span>
              <input type="file" name="myfiles[]" multiple capture="camera">
            </div>
          </div>
          <div class="medium-12 columns">
            <a href="#" class="tiny radius button add-top add-files">Add more files...</a>
          </div>
        </div>
        <div class="active-sections"> 
          <!--active Web/Print/Alt Media sections go here--> 
        </div>
        <hr>
        <div class="row">
          <div class="columns small-12"> 
            <!--<label>
              <button class="radius submit success">Submit Request</button>
            </label>--> 
            <a href="#" data-reveal-id="modal_confirm" class="button radius submit success">Submit Request</a> <br>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--<p>&nbsp;</p>
  <p class="text-center"><small>Copyright 2015. Healthy Directions. All Rights Reserved.<br>
    <a href="#" data-reveal-id="modal_contact"><i class="fi-pencil"></i>&nbsp;&nbsp;Give Feedback</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" data-reveal-id="modal_lookup"><i class="fi-magnifying-glass"></i>&nbsp;&nbsp;Lookup Job</a></small></p>
  <p>&nbsp;</p>-->
</form>

<!--inactive Web/Print/Alt Media sections go outside the form-->
<div class="hide inactive-sections">

<div class="repeatable">
  <div class="row">
    <div class="small-12 columns"><a href="#" class="button tiny radius add remove-bottom"><i class="fi-plus"></i>&nbsp;&nbsp;Add Specification</a></div>
  </div>
  <div class="duplicate">
    <div class="row">
      <div class="small-12 columns"><hr></div>
      <div class="small-6 medium-3 columns">
        <label><span class="label error alert radius right">Required</span><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="These specifications are based off of the Vehical selection.&lt;br&gt;&lt;small&gt;&lt;em&gt;This field is required.&lt;/em&gt;&lt;/small&gt;"> Specification*</strong>
          <select name="web_specifications_spec[]" class="radius medium" required>
          </select>
        </label>
      </div>
      <div class="small-6 medium-3 columns">
        <label><span class="label error alert radius right">Required</span><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="The number of assets required.&lt;br&gt;&lt;small&gt;&lt;em&gt;This field is required.&lt;/em&gt;&lt;/small&gt;"> Quantity*</strong>
          <input name="web_specifications_qty[]" class="radius" type="number" placeholder="1, 2, 3, 4, 5, etc..." required>
        </label>
      </div>
      <div class="small-12 medium-6 columns">
        <label><span class="label error alert radius right">Required</span><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="A brief description for this item.&lt;br&gt;&lt;small&gt;&lt;em&gt;This field is required.&lt;/em&gt;&lt;/small&gt;"> Description*</strong>
          <input type="text" name="web_specifications_desc[]" class="radius" placeholder="A brief description for this item." required>
        </label>
      </div>
      <div class="small-12 columns">
        <label><a href="#" class="button tiny radius remove alert remove-bottom"><i class="fi-minus"></i>&nbsp;&nbsp;Remove Specification</a></label>
      </div>
    </div>
  </div>
</div>

  <!--web-->
  <div id="web_section" class="row">
    <div class="small-12 columns">
      <p>&nbsp;</p>
      <h4>Production <small class="vehicle-label"><em class="fi-laptop"></em> Web/Online</small></h4>
      <hr>
      <div class="web-vehicle"></div>
      <div class="row">
        <div class="small-12 medium-6 columns">
          <label for="web_design_codes"><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="This is usually in reference to a print piece."> Design Codes</strong>
            <input name="design_codes" id="web_design_codes" class="radius" type="text" placeholder="WMS(5804d010215) or WMS_0315_CAT_DM">
          </label>
        </div>
        <div class="small-6 medium-3 columns">
          <label for="web_item_numbers"><span class="label error alert radius right">Required</span><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="This field is required if you have selected Magalog or Landing Page."> Item Numbers</strong>
            <input name="item_numbers" id="web_item_numbers" class="radius" type="text" placeholder="ABC123, XYZ789, etc...">
          </label>
        </div>
        <div class="small-6 medium-3 columns">
          <label for="key_codes"><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="These key codes tie to a specific offer."> Key Codes</strong>
            <input name="key_codes" id="key_codes" class="radius" type="text" placeholder="123456, 456789, etc...">
          </label>
        </div>
      </div>
      <div class="row">
        <div class="small-6 medium-3 columns">
          <label for="web_promo_codes"><span class="label error alert radius right">Required</span><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="This is the promotional code needed to recieve the discount or offer."> Promo Codes</strong>
            <input name="promo_codes" id="web_promo_codes" class="radius" type="text" placeholder="SAVE50, B1G3, etc...">
          </label>
        </div>
        <div class="small-6 medium-3 columns">
          <label for="web_expiration_date"><span class="label error alert radius right">Required</span><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="This is the expiration date of the offer."> Offer Expiration</strong></label>
          <div class="row collapse postfix-radius">
            <div class="small-10 columns">
              <input id="web_expiration_date" name="expiration_date" type="text" value="" class="expiration-date" placeholder="MM/DD/YYYY">
            </div>
            <div class="small-2 columns"><a href="#" class="calendar button postfix"><i class="fi-calendar"></i></a></div>
          </div>
        </div>
        <div class="medium-6 columns">
          <label for="disclaimer"><span class="label error alert radius right">Required</span><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="This is the disclaimer language for the promotion."> Disclaimer</strong>
            <textarea name="disclaimer" id="disclaimer" class="small radius" placeholder="*Limit one promo code per order. Not valid with previous orders. Product prices and availability are subject to change without notice..."></textarea>
          </label>
        </div>
      </div>
      <div class="row">
        <div class="small-12 medium-6 columns">
          <label for="url"><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="This is the URL in which you are driving consumers to. Example: http://www.healthydirections.com/shop-now"> URL Destination</strong>
            <input name="url" id="url" class="radius" type="text" placeholder="http://www.healthydirections.com/shop-now">
          </label>
        </div>
        <div class="medium-6 columns">
          <div class="row">
            <div class="small-6 columns">
              <label for="seo"><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="Does this job need to be optimized for SEO?"> Optimize For SEO?</strong></label>
              <div class="switch radius with-label">
                <input name="seo" id="seo" value="Yes" type="checkbox">
                <label for="seo"><span class="active">YES</span><span class="inactive">NO</span></label>
              </div>
            </div>
            <div class="small-6 columns">
              <label for="responsive"><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="Does this project need an optimized mobile experiance?"> Optimize For Mobile?</strong></label>
              <div class="switch radius with-label">
                <input name="responsive" id="responsive" value="Yes" type="checkbox">
                <label for="responsive"><span class="active">YES</span><span class="inactive">NO</span></label>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="medium-6 columns">
          <label for="existing_content"><strong>Existing URL's or Content Blocks</strong>
            <textarea id="existing_content" name="existing_content" class="small radius" placeholder=""></textarea>
          </label>
        </div>
        <div class="medium-6 columns">
          <label for="metadata"><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="This supports SEO and email optimization. Please make sure to label each component, if any."> Metadata, Keywords, or Alt Text</strong>
            <textarea name="metadata" id="metadata" class="small radius" placeholder="Metadata: &lt;meta name=&quot;robots&quot; content=&quot;nofollow&quot;&gt;
Keywords: creative, brief, efficant
ALT Text: Save 30% Today!, Buy 1 Get 1, Shop now and save up to 50%"></textarea>
          </label>
        </div>
      </div>
      <div class="row">
        <div class="medium-6 columns">
          <label for="web_pricing_details"><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="Describe the offer details or pricing structure here. Detailed pricing detail files can be posted in the File Attachment section above."> Pricing/Offer Details</strong>
            <textarea id="web_pricing_details" name="pricing_details" class="small radius" placeholder="Describe the offer details or pricing structure here. Detailed pricing detail files can be posted in the File Attachment section above."></textarea>
          </label>
        </div>
        <div class="medium-6 columns">
          <label for="web_production_notes"><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="Any production notes or special instructions can be inserted here."> Production Considerations/Notes</strong>
            <textarea name="production_notes" id="web_production_notes" class="small radius" placeholder="Any production notes or special instructions can be inserted here."></textarea>
          </label>
        </div>
      </div>
    </div>
  </div>
  
  <!--print-->
  <div id="print_section" class="row">
    <div class="small-12 columns">
      <p>&nbsp;</p>
      <h4>Production <small class="vehicle-label"><em class="fi-print"></em> Print/Offline</small></h4>
      <h4></h4>
      <hr>
      <div class="print-vehicle"></div>
      <div class="row">
        <div class="small-12 medium-6 columns">
          <label name="print_design_codes"><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="This is in reference to a previous print piece."> Previous Design Codes</strong>
            <input class="radius" type="text" name="design_codes" id="print_design_codes" placeholder="WMS(5804d010215) or WMS_0315_CAT_DM">
          </label>
        </div>
        <div class="small-6 medium-3 columns">
          <label for="service_code"><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="This is the promotional code needed to recieve the discount or offer."> Service Code</strong>
            <input class="radius" name="service_code" id="service_code" type="text" placeholder="123456">
          </label>
        </div>
        <div class="small-6 medium-3 columns">
          <label for="print_item_numbers"><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="This field is required if you have selected Magalog or Landing Page."> Item Numbers</strong>
            <input name="item_numbers" id="print_item_numbers" class="radius" type="text" placeholder="ABC123, XYZ789, etc...">
          </label>
        </div>
      </div>
      <div class="row">
        <div class="small-6 medium-3 columns">
          <label for="print_promo_codes"><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="This is the promotional code needed to recieve the discount or offer."> Promo Codes</strong>
            <input class="radius" name="promo_codes" id="print_promo_codes" type="text" placeholder="SAVE50, B1G3, etc...">
          </label>
        </div>
        <div class="small-6 medium-3 columns">
          <label for="print_expiration_date"><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="This is the expiration date of the offer."> Offer Expiration</strong></label>
          <div class="row collapse postfix-radius">
            <div class="small-10 columns">
              <input id="print_expiration_date" name="expiration_date" class="expiration-date" type="text" placeholder="MM/DD/YYYY" value="">
            </div>
            <div class="small-2 columns"><a href="#" class="calendar button postfix"><i class="fi-calendar"></i></a></div>
          </div>
        </div>
        <div class="small-6 medium-3 columns">
          <label for="print_url"><span class="label error alert right radius">Required</span><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="This is the website URL that is associated with this project."> Associated URL</strong>
            <input class="radius" type="text" name="url" id="print_url" placeholder="http://www.example.com/" pattern="url" >
          </label>
        </div>
        <div class="small-6 medium-3 columns">
          <label for="print_phone"><span class="label error alert right radius">Invalid Format</span><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="This is the phone number that is associated with this project. Do not include the country code."> Associated Phone Number</strong>
            <input class="radius" type="tel" name="phone_number" id="print_phone" placeholder="(123) 456-7890" pattern="phone">
          </label>
        </div>
      </div>
      <div class="row">
        <div class="medium-6 columns">
          <label for="print_pricing_details"><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="Describe the offer details or pricing structure here. Detailed pricing detail files can be posted in the File Attachment section above."> Pricing/Offer Details</strong>
            <textarea name="pricing_details" id="print_pricing_details" class="small radius" placeholder="Describe the offer details or pricing structure here. Detailed pricing detail files can be posted in the File Attachment section above."></textarea>
          </label>
        </div>
        <div class="medium-6 columns">
          <label for="print_production_notes"><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="Any production notes or special instructions can be inserted here."> Production Considerations/Notes</strong>
            <textarea name="production_notes" id="print_production_notes" class="small radius" placeholder="Any production notes or special instructions can be inserted here."></textarea>
          </label>
        </div>
      </div>
    </div>
  </div>
  
  <!--altmedia
  <div id="altmedia_section" class="row">
    <div class="small-12 columns">
      <p>&nbsp;</p>
      <h4>Production <small class="vehicle-label"><em class="fi-pencil"></em> Alternative Media</small></h4>
      <hr>
      <div class="row">
        <div class="large-12 columns">
          <label for="altmedia_other"><strong>Detailed Description</strong>
            <textarea id="altmedia_other" name="specs" class="large radius" placeholder=""></textarea>
          </label>
        </div>
      </div>
      <div class="row">
        <div class="medium-6 columns">
          <label for="altmedia_pricing_details"><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="Describe the offer details or pricing structure here. Detailed pricing detail files can be posted in the File Attachment section above."> Pricing/Offer Details</strong>
            <textarea name="pricing_details" id="altmedia_pricing_details" class="small radius" placeholder="Describe the offer details or pricing structure here. Detailed pricing detail files can be posted in the File Attachment section above."></textarea>
          </label>
        </div>
        <div class="medium-6 columns">
          <label for="altmedia_production_notes"><strong data-tooltip aria-haspopup="true" class="fi-info has-tip radius" title="Any production notes or special instructions can be inserted here."> Production Considerations/Notes</strong>
            <textarea name="production_notes" id="altmedia_production_notes" class="small radius" placeholder="Any production notes or special instructions can be inserted here."></textarea>
          </label>
        </div>
      </div>
    </div>
  </div>-->
</div>
<?php include('footer.php');?>
<script src="js/vendor/jquery.js"></script> 
<script src="js/foundation.min.js"></script> 
<script src="js/foundation/foundation.abide.js"></script> 
<script src="js/foundation/foundation.alert.js"></script> 
<script src="js/foundation/foundation.tooltip.js"></script> 
<script src="js/foundation/foundation.reveal.js"></script> 
<script src="js/foundation-datepicker.js"></script>
<script src="js/jquery.maskedinput.js"></script>
<script src="js/web-init.js"></script>
<script src="js/print-init.js"></script>
<script src="js/init.js"></script> 
</body>
</html>
