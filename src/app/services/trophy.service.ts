import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root',
})
export class TrophyService {
  private apiUrl = 'http://localhost:8080';

  constructor(private http: HttpClient) {}

  getAchievementsByGame(gameId: number): Observable<any> {
    return this.http.get(`${this.apiUrl}/achievements/game/${gameId}`);
  }
}
