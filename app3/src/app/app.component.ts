import { Component } from '@angular/core';

import { Todo } from './todo';



@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'rocket ship';
  message:string = 'to mars!';
  date = new Date();
  myname:string = 'gbo baba or gbo boy';

  todoValue:string;
  list:Todo[];
  
  
  ngOnInit(){
    this.list = [];
    this.todoValue = "";
  }

  addItem(){
    if (this.todoValue !== "") {
      const newItem: Todo = {
        id:Date.now(),
        value: this.todoValue,
        isDone: false
      }
      this.list.push(newItem);
    }
    this.todoValue = "";
  }
  
  deleteItem(id:number){
    this.list = this.list.filter(item => item.id !== id)
  }

  dosomething(val:string): void{
    this.myname = val;
  }
}
