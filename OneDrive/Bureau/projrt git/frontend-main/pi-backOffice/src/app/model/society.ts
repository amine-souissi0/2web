import { Devis } from "./devis";
import { Offer } from "./offer";
import { SocietyRole } from "./societyRole";
import { User } from "./user";

export class Society extends User {
    id: string;
    matricule: number;
    logo: string;
    adresse: string;
    owner: string;
    sector: string;
    sitFin: string;
    role: SocietyRole;
    devis: Devis[];
    offers: Offer[];
}