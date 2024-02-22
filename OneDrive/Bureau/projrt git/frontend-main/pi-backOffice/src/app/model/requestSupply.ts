import { Devis } from "./devis";
import { Individu } from "./individus";
import { Invoice } from "./invoice";

export class RequestSupply {
    idRequestSupply: number;
    quantity: number;
    category: string;
    description: string;
    date: Date;
    validity: number;
    devis: Devis[];
    invoice: Invoice;
    individu: Individu;
}