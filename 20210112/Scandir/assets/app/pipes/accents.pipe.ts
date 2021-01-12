import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'accents'
})
export class AccentsPipe implements PipeTransform {

  transform(value: any, ...args: any[]): any {
    return value.replace(/(é|ê|è|ë)/g, "e"); // au début, c'était return null
  }

}