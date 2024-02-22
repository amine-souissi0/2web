import { TypeReclamation } from "./typeReclamation";
import { User } from "./user";

export class Reclamation {
    id: number;
    description: string;
    typeReclamation: TypeReclamation;
    user: User;
}
