import { TestBed } from '@angular/core/testing';

import { NlinkService } from './nlink.service';

describe('NlinkService', () => {
  let service: NlinkService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(NlinkService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
