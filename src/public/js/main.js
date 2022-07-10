function choice(quizCode, selectCode, correctCode) {

     let select = document.getElementById('answer_' + quizCode + '_' + selectCode);
     let correct = document.getElementById('answer_' + quizCode+ '_' + correctCode);
     
    //  select.classList.add('answer_incorrect');
     select.style.backgroundColor="#FF3333"
     select.style.color="#fff"
    //  correct.classList.add('answer_correct');
     correct.style.backgroundColor="#1E90FF"
     correct.style.color="#fff"
     // 正解・不正解の表示
     let answerarea = document.getElementById('answerarea_' + quizCode);
     answerarea.style.display = 'block';
 
     let answerbox = document.getElementById('answertext_' + quizCode);
     if (selectCode == correctCode) {
         answerbox.className = 'answerarea_correct';
         answerbox.innerHTML = '正解！';
     } else {
         answerbox.className = 'answerarea_incorrect';
         answerbox.innerHTML = '不正解！';
     }
     
     // クリック無効化
     let option = document.getElementsByName('answer_' + quizCode);
     option.forEach(answerlist => {
          answerlist.style.pointerEvents="none"         
     });
 }


