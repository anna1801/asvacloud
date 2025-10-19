
// floatingLabel - career form
document.addEventListener('DOMContentLoaded', function () {
  var groups = document.querySelectorAll('.floating-label');

  function syncFilled(el) {
    var parent = el.closest('.floating-label');
    if (!parent) return;
    if (el.value && el.value.trim() !== '') {
      parent.classList.add('filled');
    } else {
      parent.classList.remove('filled');
    }
  }

  groups.forEach(function(group) {
    var inputs = group.querySelectorAll('input, textarea, select');

    inputs.forEach(function(inp) {
      inp.addEventListener('input', function() { syncFilled(inp); });

      inp.addEventListener('blur', function() { syncFilled(inp); });

      inp.addEventListener('paste', function() { setTimeout(function(){ syncFilled(inp); }, 0); });

      syncFilled(inp);
    });
  });

  setTimeout(function(){
    groups.forEach(function(group){
      var inputs = group.querySelectorAll('input, textarea, select');
      inputs.forEach(function(inp){ syncFilled(inp); });
    });
  }, 600);
});
// End

// Send position name to contatc form 7 field 
jQuery(function($){
    $(document).on('click', '.apply-now', function() {
      var jobName = $(this).data('name');
      var $modal = $('#careerform');
      $modal.on('shown.bs.modal', function () {
        var $input = $modal.find('input[name="your-application"]');
        if($input.length) {
          $input.val(jobName);      
          $input.attr('value', jobName); 
          $input.trigger('input');  
        }
      });
    });
});
// End

// Customize file upload
document.addEventListener('DOMContentLoaded', function() {
  const wrapper = document.querySelector('.custom-file-upload');
  if (!wrapper) return; 
  const input = wrapper.querySelector('input[type="file"]');
  const label = wrapper.querySelector('.upload-label');
  const fileName = wrapper.querySelector('.file-name');
  const removeBtn = wrapper.querySelector('.remove-file');

  input.addEventListener('change', function() {
    if (this.files.length > 0) {
      fileName.textContent = this.files[0].name;
      label.style.display = 'none';
      fileName.style.display = 'inline';
      removeBtn.style.display = 'inline';
    }
  });

  removeBtn.addEventListener('click', function() {
    input.value = ''; // clear file
    fileName.textContent = '';
    label.style.display = 'inline-flex';
    fileName.style.display = 'none';
    removeBtn.style.display = 'none';
  });
});
// End

// Remove class sent after form submit
document.addEventListener('wpcf7mailsent', function(event) {
  var form = event.target; // specific CF7 form that was sent

  setTimeout(function() {
    // Remove 'sent' class
    form.classList.remove('sent');

    // Clear the response message
    var response = form.querySelector('.wpcf7-response-output');
    if (response) {
      response.textContent = '';
      response.setAttribute('aria-hidden', 'true');
    }

    // Reset all form fields to fresh state
    form.reset();

    // Optional: also clear any custom visual states (like floating labels, file name displays, etc.)
    form.querySelectorAll('.filled').forEach(function(el) {
      el.classList.remove('filled');
    });

    // If you have custom file name or remove button UI, reset those too
    var fileName = form.querySelector('.file-name');
    if (fileName) fileName.style.display = 'none';
    var removeBtn = form.querySelector('.remove-file');
    if (removeBtn) removeBtn.style.display = 'none';
    var uploadLabel = form.querySelector('.upload-label');
    if (uploadLabel) uploadLabel.style.display = 'inline-block';

  }, 2000);
}, false);
// End