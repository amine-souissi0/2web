import { Component, OnInit } from '@angular/core';
import { Sponsor } from '../sponsor';
import { UserService } from '../user-service.service';

@Component({
  selector: 'app-user-list',
  templateUrl: './user-list.component.html',
  styleUrls: ['./user-list.component.css']
})
export class UserListComponent implements OnInit {
  sponsors!: Sponsor[];
  sponsor: Sponsor = new Sponsor(); // Assurez-vous que cela correspond à votre modèle

  constructor(private userService: UserService) {}

  ngOnInit() {
    this.userService.findAll().subscribe(data => {
      this.sponsors = data;
    });
  }

  onSubmit() {
    console.log(this.sponsor);
    // Ici, vous pouvez appeler userService pour sauvegarder les données du sponsor
    // Par exemple, si vous avez une méthode saveSponsor dans votre service
    // this.userService.saveSponsor(this.sponsor).subscribe(...);
  }
}
