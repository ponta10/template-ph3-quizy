const valids = document.querySelectorAll('.valid')
valids.forEach(function(valid){
     valid.style.backgroundColor="#1E90FF"
     valid.style.color="#fff"
})
    // アイコン画像プレビュー処理
    // 画像が選択される度に、この中の処理が走る
    $(function(){
     $("[name='image']").on('change', function (e) {
       
       var reader = new FileReader();
       
       reader.onload = function (e) {
           $("#preview").attr('src', e.target.result);
       }
   
       reader.readAsDataURL(e.target.files[0]);   
   
     });
   });
   
   const add = document.querySelector('.add');
   const create = document.querySelector('.create');
   create.addEventListener('click',function(){
     add.style.display = 'flex';
     create.style.display = 'none';
   })