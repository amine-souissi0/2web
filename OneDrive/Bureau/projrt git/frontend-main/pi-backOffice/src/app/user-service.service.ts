import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Sponsor } from './sponsor';
import { Observable } from 'rxjs';

@Injectable()
export class UserService {

  private usersUrl: string;

  constructor(private http: HttpClient) {
    this.usersUrl = 'http://localhost:8087/api/sponsors';
  }

  public findAll(): Observable<Sponsor[]> {
    return this.http.get<Sponsor[]>(this.usersUrl);
  }

  public save(user: Sponsor) {
    return this.http.post<Sponsor>(this.usersUrl, user);
  }
}