import { Candidature } from "./candidature";
import { Room } from "./room";

export class Interview {
    idInterview: number;
    date: Date;
    candidature: Candidature;
    rooms: Room[];
}