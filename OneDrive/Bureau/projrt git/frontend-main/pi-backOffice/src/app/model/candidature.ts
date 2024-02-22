import { Interview } from "./interview";
import {Offer} from "./offer"
import { Individu } from "./individus";
export class Candidature {
    idCandidature: number;
    date: Date;
    status: string;
    cv: string;
    lettre: string;
    interview: Interview;
    offer: Offer;
    individu: Individu;
}