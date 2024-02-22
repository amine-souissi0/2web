import { Pack } from "./pack";
import { User } from "./user";

export class Forum {
    id: number;
    dateDebut: Date;
    localisation: string;
    description: string;
    users: User[];
    packs: Pack[];
}