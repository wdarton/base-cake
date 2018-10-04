<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Messages</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Settings</a>
  </li>
</ul>

<div class="tab-content">
  <div class="tab-pane" id="home" role="tabpanel" aria-labelledby="home-tab">home</div>
  <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">profile</div>
  <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">messages</div>
  <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">settings</div>
</div>

<script type="text/javascript">
$('[role="tab"]').click(function() {
    top.location.hash = $(this).attr("href");
});

$(function() {
    var hash = top.location.hash;
    // hash = hash.replace('#', '');
    var defaultTab = 'info';

    console.log(hash);

    if (hash != '') {
        $(''+hash).addClass('active');
        // $(hash).tab('show');
        $('a[href="'+hash+'"]').addClass('active show');
    } else {
        $('#'+defaultTab).addClass('active');
        $('a[href="#'+defaultTab+'"]').addClass('active show');
    }

});
</script>