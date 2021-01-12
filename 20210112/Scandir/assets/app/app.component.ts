import { Component } from '@angular/core';

import { Platform } from '@ionic/angular';
import { SplashScreen } from '@ionic-native/splash-screen/ngx';
import { StatusBar } from '@ionic-native/status-bar/ngx';

@Component({
  selector: 'app-root',
  templateUrl: 'app.component.html',
  styleUrls: ['app.component.scss']
})
export class AppComponent {
  constructor(
    private platform: Platform,
    private splashScreen: SplashScreen,
    private statusBar: StatusBar
  ) {
    this.initializeApp();
  }

  initializeApp() {
    this.platform.ready().then(() => {
      this.statusBar.styleDefault();
      this.splashScreen.hide();
    });
  }

  public appPages = [
    {
      title : "Accueil",
      url   : "./home",
      icon  : "home-sharp"
    },
    {
      title : "Affichage d'une liste",
      url   : "./liste",
      icon  : "clipboard-sharp"
    },
    {
      title : "Essais avec des pipes",
      url   : "./testpipes",
      icon  : "git-commit-sharp"
    },
    {
      title : "Liste de tâches",
      url   : "./todolist",
      icon  : "albums-sharp"
    },
    {
      title : "Tests avec SWAPI (broken)",
      url   : "./apitest",
      icon  : "cloud-done-sharp"
    }
  ]
}
