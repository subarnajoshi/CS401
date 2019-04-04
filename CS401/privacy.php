<?php
session_start();
 ?>
<html>
<head>
  <link rel="stylesheet" href="privacy.css">
  <link rel="icon" href="favicon.png" sizes="32x32" type="image/png">
</head>

<body>
  <div>
    <?php
    if($_SESSION['loggedIn'] == 1){
    require_once "loggedinheader.php";}
    else{
    require_once "loggedoutheader.php";
  }
    ?>
  </div>
  <div id="privacy">
<h1>Privacy Policy</h1>
<h3>Your privacy is critically important to us.</h3>
Items bazaar is located at:<br/>
<address>
  Items bazaar<br/>860 w sherwood st. apt. 204<br/>8482189398			</address>

<p>It is Items bazaar’s policy to respect your privacy regarding any information we may collect while operating our website. This Privacy Policy applies to <a href="http://www.itemsbazaar.com">www.itemsbazaar.com</a> (hereinafter, "us", "we", or "www.itemsbazaar.com"). We respect your privacy and are committed to protecting personally identifiable information you may provide us through the Website. We have adopted this privacy policy ("Privacy Policy") to explain what information may be collected on our Website, how we use this information, and under what circumstances we may disclose the information to third parties. This Privacy Policy applies only to information we collect through the Website and does not apply to our collection of information from other sources.</p>
<p>This Privacy Policy, together with the Terms and conditions posted on our Website, set forth the general rules and policies governing your use of our Website. Depending on your activities when visiting our Website, you may be required to agree to additional terms and conditions.</p>

      <h2>Website Visitors</h2>
<p>Like most website operators, Items bazaar collects non-personally-identifying information of the sort that web browsers and servers typically make available, such as the browser type, language preference, referring site, and the date and time of each visitor request. Items bazaar’s purpose in collecting non-personally identifying information is to better understand how Items bazaar’s visitors use its website. From time to time, Items bazaar may release non-personally-identifying information in the aggregate, e.g., by publishing a report on trends in the usage of its website.</p>
<p>Items bazaar also collects potentially personally-identifying information like Internet Protocol (IP) addresses for logged in users and for users leaving comments on http://www.itemsbazaar.com blog posts. Items bazaar only discloses logged in user and commenter IP addresses under the same circumstances that it uses and discloses personally-identifying information as described below.</p>

      <h2>Gathering of Personally-Identifying Information</h2>
<p>Certain visitors to Items bazaar’s websites choose to interact with Items bazaar in ways that require Items bazaar to gather personally-identifying information. The amount and type of information that Items bazaar gathers depends on the nature of the interaction. For example, we ask visitors who sign up for a blog at http://www.itemsbazaar.com to provide a username and email address.</p>

      <h2>Security</h2>
<p>The security of your Personal Information is important to us, but remember that no method of transmission over the Internet, or method of electronic storage is 100% secure. While we strive to use commercially acceptable means to protect your Personal Information, we cannot guarantee its absolute security.</p>

      <h2>Advertisements</h2>
<p>Ads appearing on our website may be delivered to users by advertising partners, who may set cookies. These cookies allow the ad server to recognize your computer each time they send you an online advertisement to compile information about you or others who use your computer. This information allows ad networks to, among other things, deliver targeted advertisements that they believe will be of most interest to you. This Privacy Policy covers the use of cookies by Items bazaar and does not cover the use of cookies by any advertisers.</p>


      <h2>Links To External Sites</h2>
<p>Our Service may contain links to external sites that are not operated by us. If you click on a third party link, you will be directed to that third party's site. We strongly advise you to review the Privacy Policy and terms and conditions of every site you visit.</p>
<p>We have no control over, and assume no responsibility for the content, privacy policies or practices of any third party sites, products or services.</p>



      <h2>Aggregated Statistics</h2>
<p>Items bazaar may collect statistics about the behavior of visitors to its website. Items bazaar may display this information publicly or provide it to others. However, Items bazaar does not disclose your personally-identifying information.</p>


      <h2>Cookies</h2>
<p>To enrich and perfect your online experience, Items bazaar uses "Cookies", similar technologies and services provided by others to display personalized content, appropriate advertising and store your preferences on your computer.</p>
<p>A cookie is a string of information that a website stores on a visitor’s computer, and that the visitor’s browser provides to the website each time the visitor returns. Items bazaar uses cookies to help Items bazaar identify and track visitors, their usage of http://www.itemsbazaar.com, and their website access preferences. Items bazaar visitors who do not wish to have cookies placed on their computers should set their browsers to refuse cookies before using Items bazaar’s websites, with the drawback that certain features of Items bazaar’s websites may not function properly without the aid of cookies.</p>
<p>By continuing to navigate our website without changing your cookie settings, you hereby acknowledge and agree to Items bazaar's use of cookies.</p>

      <h2>E-commerce</h2>
<p>Those who engage in transactions with Items bazaar – by purchasing Items bazaar's services or products, are asked to provide additional information, including as necessary the personal and financial information required to process those transactions. In each case, Items bazaar collects such information only insofar as is necessary or appropriate to fulfill the purpose of the visitor’s interaction with Items bazaar. Items bazaar does not disclose personally-identifying information other than as described below. And visitors can always refuse to supply personally-identifying information, with the caveat that it may prevent them from engaging in certain website-related activities.</p>


      <h2>Privacy Policy Changes</h2>
<p>Although most changes are likely to be minor, Items bazaar may change its Privacy Policy from time to time, and in Items bazaar’s sole discretion. Items bazaar encourages visitors to frequently check this page for any changes to its Privacy Policy. Your continued use of this site after any change in this Privacy Policy will constitute your acceptance of such change.</p>



  <h2></h2>
    <p></p>

<h2>Credit & Contact Information</h2>
        <p>This privacy policy was created at <a style="color:inherit;text-decoration:none;" href="https://termsandconditionstemplate.com/privacy-policy-generator/" title="Privacy policy template generator" target="_blank">termsandconditionstemplate.com</a>. If you have any
           questions about this Privacy Policy, please contact us via <a href="mailto:">email</a> or <a href="tel:8482189398">phone</a>.</p>

</div>
<hr>
<div id="footer">
  <?php require_once "footer.php";?>
</div>
