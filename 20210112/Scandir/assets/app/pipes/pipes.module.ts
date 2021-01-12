import { NgModule } from '@angular/core'
import { AccentsPipe } from "./accents.pipe"
import { DistancePipe } from "./distance.pipe"

@NgModule({
  declarations: [
    AccentsPipe,
    DistancePipe
  ],
  imports: [],
  exports: [
    AccentsPipe,
    DistancePipe
  ]
})

export class PipesModule { }
