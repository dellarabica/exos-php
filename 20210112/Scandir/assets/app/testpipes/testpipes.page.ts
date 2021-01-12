import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-testpipes',
  templateUrl: './testpipes.page.html',
  styleUrls: ['./testpipes.page.scss'],
})
export class TestpipesPage implements OnInit {

  private nom: string
  private prenom: string
  private age: number

  constructor(public route: ActivatedRoute) {
    this.route.queryParams.subscribe((params) => {
      // ne sera exécuté QUE quand params aura été récupéré (et ça va peut être être long)
      this.nom = params['nom']
      this.prenom = params['prenom']
      this.age = params['age']
      // console.log('le prenom ' + params['people'].prenom)
      // console.log('le nom ' + params['people'].nom)
      // console.log('age ' + params['people'].age)
    })
    // cette ligne sera lue immédiatement après this.route.queryParams, peu importe qu'on ait récupéré params ou pas
  }

  ngOnInit() {
  }

}