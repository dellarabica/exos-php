import { isNull } from '@angular/compiler/src/output/output_ast';
import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
    name:'distance'
}
)
export class DistancePipe implements PipeTransform {
    transform(value: any, arg): any {
      let trsf: any
      if (isNaN(value) || value === null){
          value = " inconnue.";
      } else if (value > 1000) {
          trsf = value;
          value = " de " + trsf/1000 + " km.";
        } else {
          trsf = value;
          value = " de " + trsf + " m.";
        }
        return value;
      }
}