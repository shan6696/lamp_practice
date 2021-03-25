<script>
  const selectElement = document.querySelector('.item_sort');
  // console.log(selectElement.value);
  selectElement.addEventListener('change',function() {
    if(selectElement.value === 'new') {
      // history.replaceState('','index.php','?value=new');
      // window.location.reload();
      location.href='index.php?value=new';
    }else if (selectElement.value === 'row') {
      location.href='index.php?value=row';
    }else if (selectElement.value === 'high') {
      location.href='index.php?value=high'
    }
  } );
</script>