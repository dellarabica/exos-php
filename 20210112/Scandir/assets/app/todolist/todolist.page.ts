import { Component, OnInit } from '@angular/core';
import { AlertController } from '@ionic/angular';
import { ModalController } from '@ionic/angular';
import { NewtaskPage } from '../newtask/newtask.page';
import { Storage } from '@ionic/storage';

@Component({
  selector: 'app-todolist',
  templateUrl: './todolist.page.html',
  styleUrls: ['./todolist.page.scss'],
})

export class TodolistPage implements OnInit {

  //Variables
  newtask: any
  tasks: Array<any> = []
  notasks = false
  feedback: string
  checked: boolean
  index: number
  newtaskObject

  constructor(private alertController: AlertController, public modalController: ModalController, private storage: Storage){
    let mesNotes = [
      { 'id': 1, 'title': 'Une note', 'content': 'son contenu' },
      { 'id': 2, 'title': 'Une note 2', 'content': 'son contenu 2' }
    ];
  }
  
  ngOnInit(){

  }

  async openModal() {
    const modal = await this.modalController.create({
    component: NewtaskPage
    });
    modal.onDidDismiss().then(data=>{
      this.newtask = JSON.parse(data.data)
      console.log(this.newtask.task)
      console.log(this.newtask.name)
      console.log(this.newtask.mail)
      console.log(this.newtask.phone)
     this.addTaskinList(this.newtask.name, this.newtask.task, this.newtask.mail, this.newtask.phone)
    })
    return await modal.present();
   }
  

async editInfo(editTask){
  let i = this.tasks.indexOf(editTask);

  const modal = await this.modalController.create({
    component: NewtaskPage,
    componentProps: {
      'task': this.tasks[i].name,
      'name': this.tasks[i].author,
      'mail': this.tasks[i].mail,
      'phone': this.tasks[i].phone

    }
    });
    modal.onDidDismiss().then(data=>{
      this.newtask = JSON.parse(data.data)
      console.log(this.newtask.task)
      console.log(this.newtask.name)
      console.log(this.newtask.mail)
      console.log(this.newtask.phone)
     //this.addTaskinList(this.newtask.name, this.newtask.task, this.newtask.mail, this.newtask.phone)
    })
    return await modal.present();
}

async yarien() {
    const alert = await this.alertController.create({
      cssClass: 'my-custom-class',
      header: 'ERREUR',
      message: 'Vous ne pouvez pas ajouter une tâche vide !!!',
      buttons: ["aoké, jeu savé pa"]
    });

    await alert.present();
  }

  async alertDelTask(deltask) {
    const alert = await this.alertController.create({
      cssClass: 'my-custom-class',
      header: 'Confirmation',
      message: 'Voulez-vous supprimer cette tâche ?',
      buttons: [
        {
          text: 'Non',
          role: 'cancel',
          handler: () => {
            console.log('Confirm Cancel');
          }
        }, {
          text: 'Oui',
          handler: (alertData) => 
          {
            let i = this.tasks.indexOf(deltask);
            this.tasks.splice(i, 1);
            if(this.tasks.length == 0)
            {
              this.notasks = false;
            }
            this.updateListAndMessage();
          }
        }
      ]
    });
    await alert.present();
  }

  addTaskinList(author, task, mail, phone){
    if(task==null || author == null || mail == null || phone == null)
    {
      this.yarien();
    }
    else{    
      this.notasks = true;
      this.newtaskObject = {
        id: task.index,
        name: task,
        author: author,
        email: mail,
        phone: phone,
        done: false
      }
      this.index = this.tasks.length +1
      this.tasks.push(this.newtaskObject)
      console.log(this.tasks)
     this.updateListAndMessage()
    }
  }

 async showInfo(showtask){

  let i = this.tasks.indexOf(showtask); //On récupère l'ID de la tâche

  const alert = await this.alertController.create({
    cssClass: 'my-custom-class',
    header: 'Contact',
    message:  `
    <p>Adresse mail : ` + this.tasks[i].email + `</p>
    <p>Numéro de téléphone : ` + this.tasks[i].phone + `</p>`
  ,
  buttons: [
      {
        text: 'Fermer',
        handler: () => {}
      }
    ]
  })

  await alert.present();
  }

  sortTaskList(){
    
    this.tasks.sort((taskA, taskB) => 
    {
      if (taskA.done && !taskB.done){
      return 1;
      }
      else
      {
      return -1;
      }
    })

  }

  rienAFaire(){
  let tasksToDo = this.tasks.filter((task) => {
    return !task.done
    }).length;
    let tasksDone = this.tasks.filter((task) => {
      return task.done
      }).length;
    return tasksToDo == 0 && tasksDone > 0;
    
  }

  updateListAndMessage(){
    let tasksToDo = this.tasks.filter((task) => {
      return !task.done
    }).length;
    let tasksDone = this.tasks.filter((task) => {
      return task.done
    }).length;
    this.sortTaskList();
    let str1, str2;
    if (tasksToDo < 2){
      str1 = " tâche à faire"
    }
    else
    {
      str1 = " tâches à faire"
    }
    if (tasksDone < 2){
      str2 = " tâche terminée"
    }
    else
    {
      str2 = " tâches terminées"
    }
      this.feedback = tasksToDo + str1 + " //// " + tasksDone + str2;
      
    }

    async getUser() {
      // On récupère le login de l'utilisateur courant (sauvegarde en base)
      // Grâce au mot clé "await", on récupère notre donnée directement
      // autrement dit, on n'avance pas dans la méthode, avant que l'on est
      // pu récupérer la valeur de la clé 'user_session'
      let user_session = await this.storage.get('user_session');
  
      return this.storage.get('users').then((usersList) => {
        // On récupère tous les utilisateurs
        // Et on ne renvoie que celui dont le login est égal à user_session
  
        // La méthode Find permet de renvoyer la valeur d'une liste
        // selon une ou plusieurs conditions. Ici la condition est user.id égal à user_session.
        return usersList.find((user) => user.login == user_session);
      });
    }
}