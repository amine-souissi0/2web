import { User } from "./user";

export class Sponsor {
    idSponsor: number;
    name: string;
    contactName: string;
    contactEmail: string;
    contactPhone: string;
    website: string;
    logoUrl: string;
    description: string;
    user: User;
}