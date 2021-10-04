import {Component, NgModule, OnInit, ViewChild} from '@angular/core';
import {MaterialsService} from "../../services/materials.service";
import {ActivatedRoute} from "@angular/router";
import {errorObject} from "rxjs/internal-compatibility";
import {Material} from "../../Models/material";
import {Quest} from "../../Models/quest";

@Component({
  selector: 'app-material',
  templateUrl: './material.component.html',
  styleUrls: ['./material.component.sass']
})
export class MaterialComponent implements OnInit {

  material: Material;
  private course: string;
  private method: string;
  private alias: string;
  content: string

  isQuestionCardShow = "Начать тест";

  pageContainer = document.getElementsByClassName('page');
  quizContainer = document.getElementById('quiz');
  resultsContainer = document.getElementById('results');
  submitButton = document.getElementById('submit');


  constructor(
    private materialsService: MaterialsService,
    private route: ActivatedRoute,
  ) {
    this.material = errorObject
  }

  ngOnInit(): void {
    this.route.params.subscribe(
      params => {
        this.course = params['course'];
        this.method = params['method'];
        this.alias = params['alias'];
      }
    );
    this.storeMaterials();
  }

  storeMaterials(): void {
    this.materialsService.storeMaterials(this.course, this.method, this.alias).subscribe((data: Material) => {

        this.material = data;

        console.log(this.material)
      }
    );
  }

  startQuiz() {
    if(this.isQuestionCardShow == "Проверить") {
      this.showResults()
    } else {
      this.isQuestionCardShow = "Проверить";
      this.buildQuiz();
    }

  }

  private myqvest: any;

  buildQuiz(){
    // variable to store the HTML output
    const output = [];

    // for each question...
    this.myqvest =this.Recycling(this.material.contents);
    this.myqvest.forEach(
      (currentQuestion: Quest, questionNumber) => {
        let i = 0;

        // variable to store the list of possible answers
        const answers = [];

        // and for each available answer...

        for( let letter in currentQuestion.answer){
          // ...add an HTML radio button
          answers.push(
            `<label class="radio">
            <input  type="checkbox" name="question${i}" value="${i}">
            <span>
            ${currentQuestion.answer[i]}</span>
            </label>`
          );
          i++
        }

        // add this question and its answers to the output
        output.push(
          `<div class="question"> ${currentQuestion.question} </div>
		<div class="answers"> ${answers.join('')} </div>`
        );
      }
    );
    // finally combine our output list into one string of HTML and put it on the page
    this.content = output.join('');
  }

  showResults(){
    const answerContainers = []
    // gather answer containers from our quiz correctAnswer
    if(!(this.quizContainer.querySelectorAll('.answers') === null)) {
      const answerContainers = this.quizContainer.querySelectorAll('.answers');
    }



    // keep track of user's answers
    let numCorrect = 0;
    // for each question...
    this.myqvest.forEach( (currentQuestion, questionNumber) => {

      // find selected answer
      const answerContainer = answerContainers[questionNumber];
      const selector = `input[name=question${questionNumber}]:checked`;
      //const userAnswer = (answerContainer.querySelector(selector) || {}).value;
      //console.log(answerContainer);
      var checkbox = document.getElementsByName(`question${questionNumber}`) as any;

      var userAnswer = "";

      for(var i=0; i<checkbox.length; i++){
        if(checkbox[i].checked) {
          userAnswer+=checkbox[i].value+" ";
          userAnswer = userAnswer.replace(/\s+/g, '');
        }
      }


      // if answer is correct
      if(userAnswer === currentQuestion.correctAnswer){
        // add to the number of correct answers
        numCorrect++;
      }
    });
    let persent = numCorrect/this.myqvest.length*100;
    // show number of correct answers out of total
    //console.log(persent.toFixed());
    this.resultsContainer.innerHTML = `${persent.toFixed()}%`;
  }

  Recycling(material){
    let lengthMaterial = material.length;
    if (lengthMaterial > 15) {
      lengthMaterial = 15;
    }
    let elementM = [];
    for (var i = 0; elementM.length < lengthMaterial; i++) {
      var a = Math.floor(Math.random() * material.length);
      if ( this.binary_search(elementM, material[a]) == false) {
        elementM.push(material[a]);
      }

    }
    return elementM;
  }

  binary_search(list, item) {
    let low = 0;
    let high = (list.length)-1;

    while (low <= high) {
      let mid = (low + high);
      let guess = list[mid];
      if (guess == item) {
        return true;
      } else if ( guess > item) {
        high = mid -1;
      } else {
        low = mid + 1;
      }
    }
    return false;
  }
}