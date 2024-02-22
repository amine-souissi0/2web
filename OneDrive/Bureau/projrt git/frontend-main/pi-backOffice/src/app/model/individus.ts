import { Candidature } from "./candidature";
import { IndividuRole } from "./individusRole";
import { RequestSupply } from "./requestSupply";
import { User } from "./user";

export class Individu extends User {
    id: string;
    identity: string;
    firstName: string;
    lastName: string;
    role: IndividuRole;
    requestSupplies: RequestSupply[];
    candidatures: Candidature[];
}
